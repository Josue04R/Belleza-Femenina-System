@extends('layout.template1')

@section('title', 'Finalizar Pedido')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Completar Pedido</h2>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección de entrega</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
        </div>

        <h4>Resumen del Pedido</h4>
        <ul class="list-group mb-3">
            @php $total = 0; @endphp
            @foreach($carrito as $item)
                @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $item['producto'] }}</strong>  
                        <br>
                        <small>Talla: {{ $item['talla'] }} | Color: {{ $item['color'] }}</small>  
                        <br>
                        <small>Cantidad: {{ $item['cantidad'] }}</small>
                    </div>
                    <span>${{ number_format($subtotal, 2) }}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <strong>Total</strong>
                <strong>${{ number_format($total, 2) }}</strong>
            </li>
        </ul>

        <button type="submit" class="btn btn-primary btn-lg">Confirmar Pedido</button>
    </form>
</div>
@endsection
