@extends('layout.template1')

@section('title', $variante->producto->nombre_p . ' | Editar Carrito')

@section('estilos_css')
    <link rel="stylesheet" href="{{ asset('/css/carrito/carritoEditar.css') }}">
@endsection

@section('content')
    @php
        $carritoCantidad = session('carrito')[$variante->idVariante]['cantidad'] ?? 0;
        $stockTotal = $variante->stock + $carritoCantidad;
    @endphp

    <div class="container py-5">
        <div class="producto-container">
            <div class="row align-items-center g-4">
                <!-- Imagen producto -->
                <div class="col-lg-5">
                    <div class="producto-img-wrapper">
                        <img src="{{ asset('/img/faja2.jpg') }}" alt="{{ $variante->producto->nombreProducto }}" class="producto-img">
                    </div>
                </div>

                <!-- Info producto -->
                <div class="col-lg-7 producto-info">
                    <h1 class="producto-titulo">{{ $variante->producto->nombreProducto }}</h1>
                    <p><strong>Talla:</strong> {{ $variante->talla->talla ?? 'Sin talla' }}</p>
                    <p><strong>Color:</strong> {{ $variante->color }}</p>

                    <div class="producto-precio">
                        ${{ number_format($variante->precio, 2) }}
                    </div>

                    <div class="mt-3">
                        <div class="detalle-item">Stock disponible: <span id="stock-disponible">{{ $stockTotal }}</span></div>
                    </div>

                    <!-- Formulario -->
                    <form action="{{ route('carrito.actualizar', $variante->idVariante) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-3">
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

                        <div class="row g-2">
                            <div class="col-md-6">
                                <button type="submit" class="btn-editar">
                                    Guardar cambios
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('carrito.index') }}" class="btn-cancelar">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputCantidad = document.getElementById('cantidad');
            const stockDisponibleSpan = document.getElementById('stock-disponible');
            const stockTotal = parseInt(inputCantidad.max);

            inputCantidad.addEventListener('input', function () {
                let cantidadNueva = parseInt(this.value) || 1;
                if (cantidadNueva < 1) cantidadNueva = 1;
                if (cantidadNueva > stockTotal) cantidadNueva = stockTotal;
                this.value = cantidadNueva;

                let stockDisponible = stockTotal - cantidadNueva;
                stockDisponibleSpan.textContent = stockDisponible;
            });

            inputCantidad.dispatchEvent(new Event('input'));
        });
    </script>
@endsection
