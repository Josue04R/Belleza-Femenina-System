<h2>Nuevo Pedido Recibido</h2>

<p>ID Pedido: {{ $pedido->idPedido }}</p>
<p>Cliente: {{ $pedido->idCliente }}</p>
<p>Total: ${{ number_format($pedido->total,2) }}</p>

<h3>Detalles:</h3>
<ul>
@foreach($carrito as $producto)
    <li>{{ $producto['cantidad'] }} x {{ $producto['nombre'] }} - ${{ number_format($producto['precio'],2) }}</li>
@endforeach
</ul>
