<?php

namespace App\Http\Controllers;

use App\Mail\PedidoRealizadoMail;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{

    /**
     * Formulario de checkout.
     */
    public function misPedidos()
    {
        $clienteId = session()->get('cliente_id');

        if (!$clienteId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        // Traer pedidos del cliente con sus detalles y variantes
        $pedidos = Pedido::with(['detalles.variante'])
            ->where('idCliente', $clienteId)
            ->orderBy('fecha', 'desc')
            ->get();

        return view('pedidos.mis_pedidos', compact('pedidos'));
    }



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
            'idCliente' => $clienteId,
            'fecha' => Carbon::now(),
            'direccion' => $request->direccion,
            'estado' => 'pendiente',
            'total' => $total,
            'observaciones' => $request->observaciones,
        ]);

        // Crear detalle del pedido
        foreach ($carrito as $producto) {
            DetallePedido::create([
                'idPedido'     => $pedido->idPedido,              // <- nombre real de la columna
                'id_variantes' => $producto['id_variante'],       // <- igual al de la tabla
                'cantidad'     => $producto['cantidad'],
                'precioUnitario' => $producto['precio'],
                'subtotal'     => $producto['precio'] * $producto['cantidad'],
            ]);
        }

        // Enviar correo simple al administrador
        Mail::raw('Un cliente ha realizado un pedido nuevo.', function($message) {
            $message->to('romerosanto784@gmail.com')
                    ->subject('Nuevo pedido recibido');
        });
        session()->forget('carrito');

        return redirect()->route('carrito.index')->with('success', 'Tu pedido fue realizado con éxito.');
    }
}
