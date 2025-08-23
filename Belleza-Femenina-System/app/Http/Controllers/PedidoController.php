<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PedidoController extends Controller
{
    /**
     * Formulario de checkout.
     */
    public function create()
    {
        $carrito = session()->get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'Tu carrito está vacío.');
        }
        return view('checkout.create', compact('carrito'));
    }

    /**
     * Guarda el pedido con sus detalles.
     */
    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'observaciones' => 'nullable|string|max:1000',
        ]);

        $carrito = session()->get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'No tienes productos en el carrito.');
        }

        // Obtener ID del cliente desde sesión
        $clienteId = Session::get('cliente_id');

        if (!$clienteId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión antes de realizar un pedido.');
        }

        // Calcular total
        $total = 0;
        foreach ($carrito as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        // Crear pedido
        $pedido = Pedido::create([
            'clienteId' => $clienteId,
            'fecha' => Carbon::now(),
            'direccion' => $request->direccion,
            'estado' => 'pendiente',
            'total' => $total,
            'observaciones' => $request->observaciones,
        ]);

        // Crear detalle del pedido
        foreach ($carrito as $producto) {
            DetallePedido::create([
                'pedidoId' => $pedido->id,
                'varianteId' => $producto['id_variante'],
                'cantidad' => $producto['cantidad'],
                'precioUnitario' => $producto['precio'],
                'subtotal' => $producto['precio'] * $producto['cantidad'],
            ]);
        }

        // Vaciar carrito de sesión
        session()->forget('carrito');

        return redirect()->route('carrito.index')->with('success', 'Tu pedido fue realizado con éxito.');
    }
}
