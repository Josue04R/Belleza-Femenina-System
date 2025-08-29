@extends('layout.template1')

@section('estilos_css')
<link rel="stylesheet" href="{{ url('/css/pedidos/pedidos.css') }}">
@endsection

@section('content')
<div class="pedidos-container py-5">
    <h1 class="text-center mb-5">Mis Pedidos</h1>

    @if($pedidos->isEmpty())
        <p class="text-center text-muted">No tienes pedidos aún.</p>
    @endif

    <div class="row g-4">
        @foreach($pedidos as $pedido)
        <div class="col-lg-4 col-md-6">
            <div class="pedido-card">
                <div class="pedido-header">
                    <span>Pedido #{{ $pedido->idPedido }}</span>
                    <span>{{ \Carbon\Carbon::parse($pedido->fecha)->format('d/m/Y') }}</span>
                </div>
                <div class="pedido-body">
                    <div class="pedido-status-total">
                        <span class="pedido-status {{ $pedido->estado }}">{{ ucfirst($pedido->estado) }}</span>
                        <span class="pedido-total">Total: ${{ number_format($pedido->total, 2) }}</span>
                    </div>

                    @if(isset($pedido->direccion) && $pedido->direccion)
                        <p class="pedido-lugar"><strong>Lugar de entrega:</strong> {{ $pedido->direccion }}</p>
                    @endif


                    @if($pedido->observaciones)
                        <p class="pedido-observaciones">Observaciones: {{ $pedido->observaciones }}</p>
                    @endif

                    <div class="pedido-detalles">
                        <ul>
                        @foreach($pedido->detalles as $detalle)
                            <li>
                                {{ $detalle->cantidad }} x {{ $detalle->variante->nombre ?? 'Producto' }}
                                @if(isset($detalle->variante->color)) | Color: {{ $detalle->variante->color }} @endif
                                @if(isset($detalle->variante->talla['talla'])) | Talla: {{ $detalle->variante->talla['talla'] }} @endif
                                - ${{ number_format($detalle->subtotal,2) }}
                            </li>
                        @endforeach
                        </ul>
                    </div>

                    <p class="pedido-aviso">
                        Para cancelaciones o devoluciones, contacta directamente con la empresa.
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
