@extends('layout.template1')

@section('title', 'Finalizar Pedido')

@section('estilos_css')
<link rel="stylesheet" href="{{ url('css/checkout/checkout.css') }}">  
@endsection

@section('content')
<div class="checkout-container container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">

            <h2 class="mb-4 text-center fw-bold text-primary">Completar Pedido</h2>

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <!-- Dirección -->
                <div class="mb-4">
                    <label for="direccion" class="form-label fw-semibold">📍 Dirección de entrega</label>
                    <input type="text" class="form-control custom-input" id="direccion" name="direccion" required>
                </div>

                <!-- Observaciones -->
                <div class="mb-4">
                    <label for="observaciones" class="form-label fw-semibold">📝 Observaciones</label>
                    <textarea class="form-control custom-input" id="observaciones" name="observaciones" rows="3"></textarea>
                </div>

                <!-- Resumen -->
                <h4 class="fw-bold text-secondary mt-4 mb-3">🛍 Resumen del Pedido</h4>
                <ul class="list-group mb-4">
                    @php $total = 0; @endphp
                    @foreach($carrito as $item)
                        @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 custom-item">
                            <div>
                                <strong>{{ $item['producto'] }}</strong>  
                                <br>
                                <small class="text-muted">Talla: {{ $item['talla'] }} | Color: {{ $item['color'] }}</small>  
                                <br>
                                <small class="text-muted">Cantidad: {{ $item['cantidad'] }}</small>
                            </div>
                            <span class="fw-semibold">${{ number_format($subtotal, 2) }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between border-0 custom-total">
                        <strong>Total</strong>
                        <strong>${{ number_format($total, 2) }}</strong>
                    </li>
                </ul>

                <!-- Botón -->
                <div class="text-center">
                    <button type="submit" class="btn btn-custom btn-lg px-5">Confirmar Pedido</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
