<?php

namespace App\Http\Controllers;

use App\Mail\PedidoRealizadoMail;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PedidoController extends Controller
{
    /**
     * Muestra los pedidos del cliente autenticado.
     *
     * @return \Illuminate\Http\Response
     */
    public function misPedidos()
    {
        $clienteId = session()->get('cliente_id');

        if (!$clienteId) {
            return redirect()
                ->route('login')
                ->with('error', 'Debes iniciar sesión.');
        }

        // Obtener pedidos con detalles y variantes
        $pedidos = Pedido::with(['detalles.variante'])
            ->where('idCliente', $clienteId)
            ->orderBy('fecha', 'desc')
            ->get();

        return view('pedidos.mis_pedidos', compact('pedidos'));
    }

    /**
     * Muestra el formulario de checkout con el carrito actual.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()
                ->route('carrito.index')
                ->with('error', 'Tu carrito está vacío.');
        }

        return view('checkout.create', compact('carrito'));
    }

    /**
     * Guarda un nuevo pedido con sus detalles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'direccion'     => 'required|string|max:255',
            'observaciones' => 'nullable|string|max:1000',
        ]);

        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()
                ->route('carrito.index')
                ->with('error', 'No tienes productos en el carrito.');
        }

        // Obtener ID del cliente desde sesión
        $clienteId = Session::get('cliente_id');

        if (!$clienteId) {
            return redirect()
                ->route('login')
                ->with('error', 'Debes iniciar sesión antes de realizar un pedido.');
        }

        // Calcular el total del pedido
        $total = collect($carrito)->reduce(function ($carry, $producto) {
            return $carry + ($producto['precio'] * $producto['cantidad']);
        }, 0);

        // Crear pedido
        $pedido = Pedido::create([
            'idCliente'     => $clienteId,
            'fecha'         => Carbon::now(),
            'direccion'     => $request->direccion,
            'estado'        => 'pendiente',
            'total'         => $total,
            'observaciones' => $request->observaciones,
        ]);

        // Crear detalles del pedido
        foreach ($carrito as $producto) {
            DetallePedido::create([
                'idPedido'       => $pedido->idPedido, // nombre real de la columna
                'idVariante'   => $producto['idVariante'],
                'cantidad'       => $producto['cantidad'],
                'precioUnitario' => $producto['precio'],
                'subtotal'       => $producto['precio'] * $producto['cantidad'],
            ]);
        }

        // Enviar correo de notificación (simplificado)
        Mail::raw('Un cliente ha realizado un pedido nuevo.', function ($message) {
            $message->to('romerosanto784@gmail.com')
                    ->subject('Nuevo pedido recibido');
        });

        // Vaciar carrito
        session()->forget('carrito');

        return redirect()
            ->route('carrito.index')
            ->with('success', 'Tu pedido fue realizado con éxito.');
    }
}
