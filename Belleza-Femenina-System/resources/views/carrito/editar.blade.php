@extends('layout.template1')

@section('title', $variante->producto->nombre_p . ' | Editar Carrito')

@section('content')
    @php
        // Cantidad que ya está en carrito para esta variante
        $carritoCantidad = session('carrito')[$variante->id_variantes]['cantidad'] ?? 0;
        // Stock total: stock actual + cantidad en carrito (porque stock fue descontado)
        $stockTotal = $variante->stock + $carritoCantidad;
    @endphp

    <div class="container py-5">
        <h1>Editar producto en el carrito</h1>

        <div class="card p-4 mb-4">
            <h4>{{ $variante->producto->nombre_p }}</h4>
            <p><strong>Talla:</strong> {{ $variante->talla->talla ?? 'Sin talla' }}</p>
            <p><strong>Color:</strong> {{ $variante->color }}</p>
            <p><strong>Precio:</strong> ${{ number_format($variante->precio, 2) }}</p>
            <p>
                <strong>Stock disponible: </strong>
                <span id="stock-disponible">{{ $stockTotal }}</span>
            </p>
        </div>

        <form action="{{ route('carrito.actualizar', $variante->id_variantes) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input 
                    type="number" 
                    id="cantidad" 
                    name="cantidad" 
                    class="form-control" 
                    min="1" 
                    max="{{ $stockTotal }}" 
                    value="{{ $carritoCantidad > 0 ? $carritoCantidad : 1 }}" 
                    required
                >
            </div>
            <button type="submit" class="btn btn-primary">
                Guardar cambios
            </button>
            <a href="{{ route('carrito.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputCantidad = document.getElementById('cantidad');
            const stockDisponibleSpan = document.getElementById('stock-disponible');

            // Stock total (original + cantidad en carrito)
            const stockTotal = parseInt(inputCantidad.max);

            inputCantidad.addEventListener('input', function () {
                let cantidadNueva = parseInt(this.value) || 1;
                if(cantidadNueva < 1) cantidadNueva = 1;
                if(cantidadNueva > stockTotal) cantidadNueva = stockTotal;
                this.value = cantidadNueva;

                // Stock disponible es stockTotal - cantidadNueva
                let stockDisponible = stockTotal - cantidadNueva;
                stockDisponibleSpan.textContent = stockDisponible;
            });

            // Dispara evento input para inicializar stock disponible correcto
            inputCantidad.dispatchEvent(new Event('input'));
        });
    </script>

@endsection
