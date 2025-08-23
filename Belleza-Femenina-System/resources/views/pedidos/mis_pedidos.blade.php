@extends('layout.template1')

@section('content')
    <h1>Mis Pedidos</h1>

    @if($pedidos->isEmpty())
        <p>No tienes pedidos aún.</p>
    @endif

    @foreach($pedidos as $pedido)
        <div style="border:1px solid #ccc; padding:15px; margin-bottom:15px; border-radius:8px;">
            <p><strong>Pedido #{{ $pedido->idPedido }}</strong></p>
            <p>Fecha: {{ $pedido->fecha }}</p>
            <p>Estado: {{ ucfirst($pedido->estado) }}</p>
            <p>Total: ${{ number_format($pedido->total,2) }}</p>
            @if($pedido->observaciones)
                <p>Observaciones: {{ $pedido->observaciones }}</p>
            @endif

            <h4>Detalles del pedido:</h4>
            <ul>
            @foreach($pedido->detalles as $detalle)
                <li>
                    {{ $detalle->cantidad }} x {{ $detalle->variante->nombre ?? 'Producto' }}
                    @if(isset($detalle->variante->color))
                        | Color: {{ $detalle->variante->color }}
                    @endif
                    @if(isset($detalle->variante->talla['talla']))
                        | Talla: {{ $detalle->variante->talla['talla'] }}
                    @endif
                    - Precio Unitario: ${{ number_format($detalle->precioUnitario,2) }}
                    | Subtotal: ${{ number_format($detalle->subtotal,2) }}
                </li>
            @endforeach
            </ul>

            <p style="color:red; font-weight:bold;">
                Para cualquier cancelación o devolución, por favor contacta directamente con la empresa para verificar si aplica la devolución de dinero.
            </p>
        </div>
    @endforeach
@endsection
