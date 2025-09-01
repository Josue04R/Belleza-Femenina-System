@extends('layout.template1')

@section('title', $producto->nombreProducto . ' | Mi Tienda')

@section('estilos_css')
<link rel="stylesheet" href="{{ asset('/css/producto/productoShow.css') }}">
@endsection

@section('content')
    <div class="container py-5">
        <div class="producto-container">
            <div class="row align-items-center g-4">
                <!-- Imagen producto -->
                <div class="col-lg-5">
                    <div class="producto-img-wrapper">
                        @if($producto->imagen)
                            <img id="producto-imagen" src="{{ $producto->imagen }}" alt="{{ $producto->nombreProducto }}" class="producto-img">
                        @else
                            <img id="producto-imagen" src="{{ asset('/img/faja2.jpg') }}" alt="{{ $producto->nombreProducto }}" class="producto-img">
                        @endif
                    </div>
                </div>

                <!-- Info producto -->
                <div class="col-lg-7 producto-info">
                    <h1 class="producto-titulo">{{ $producto->nombreProducto }}</h1>
                    <p><strong>Marca:</strong> {{ $producto->marcaProducto }}</p>
                    <p><strong>Material:</strong> {{ $producto->material }}</p>
                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>

                    <div id="precio" class="producto-precio">
                        ${{ number_format($producto->variantes->first()->precio ?? 0, 2) }}
                    </div>
                    <small class="text-muted">Pago a plazos con tarjeta de crédito, $0.20 por plazo</small>

                    @php
                        $primeraVariante = $producto->variantes->first();
                        $colores = $producto->variantes->groupBy('color');
                    @endphp
                    @if($primeraVariante)
                        <div class="mt-3">
                            <div class="detalle-item">Stock: <span id="stock">{{ $primeraVariante->stock }}</span> | Color: <span id="color">{{ $primeraVariante->color }}</span></div>
                            <div class="detalle-item">Envío gratis en cada pedido</div>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form id="form-agregar-carrito" action="{{ route('carrito.agregar') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="idVariante" id="idVariante" value="{{ $primeraVariante->idVariante ?? '' }}">

                        <div class="row g-2">
                            <!-- Select de color -->
                            <div class="col-md-6">
                                <select id="color-select" class="form-select">
                                    @foreach ($colores as $color => $variantesColor)
                                        <option value="{{ $color }}">{{ $color }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Select de talla -->
                            <div class="col-md-6">
                                <select id="talla-select" name="talla" class="form-select">
                                    <!-- JS llenará las tallas -->
                                </select>
                            </div>
                        </div>

                        <!-- Cantidad -->
                        <div class="row g-2 mt-2">
                            <div class="col-md-6">
                                <input type="number" name="cantidad" id="cantidad" class="form-control" 
                                    min="1" max="{{ $primeraVariante->stock ?? 1 }}" value="1" required>
                            </div>
                        </div>

                       <div class="d-flex justify-content-center mt-3 gap-3" style="max-width: 600px; margin: auto;">
                            <button type="submit" class="btn-carrito flex-fill" style="height: 50px; font-size: 1rem; display: flex; align-items: center; justify-content: center;">
                                Agregar al carrito
                            </button>

                            <a href="{{ route('home') }}" class="btn-carrito flex-fill" style="height: 50px; font-size: 1rem; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                <i class="bi bi-arrow-left me-2"></i> Volver al inicio
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(function() {
        let variantes = @json($producto->variantes);

        function cargarTallas(colorSeleccionado) {
            let opciones = '';
            let primeraVariante = null;

            variantes.forEach(v => {
                if (v.color === colorSeleccionado) {
                    opciones += `<option value="${v.idVariante}">${v.talla.talla}</option>`;
                    if (!primeraVariante) primeraVariante = v;
                }
            });

            $('#talla-select').html(opciones);

            if (primeraVariante) {
                actualizarInfoVariante(primeraVariante.idVariante);
            }
        }

        function actualizarInfoVariante(idVariante) {
            let variante = variantes.find(v => v.idVariante == idVariante);
            if (variante) {
                $('#color').text(variante.color);
                $('#stock').text(variante.stock);
                $('#idVariante').val(variante.idVariante);
                $('#precio').text(`$${parseFloat(variante.precio).toFixed(2)}`);

                // Actualizar imagen si tiene
                if (variante.imagen) {
                    $('#producto-imagen').attr('src', variante.imagen);
                }

                let maxStock = variante.stock > 0 ? variante.stock : 1;
                $('#cantidad').attr('max', maxStock);
                if ($('#cantidad').val() > maxStock) $('#cantidad').val(maxStock);
                if ($('#cantidad').val() < 1) $('#cantidad').val(1);
            }
        }

        $('#color-select').on('change', function() {
            cargarTallas($(this).val());
        });

        $('#talla-select').on('change', function() {
            actualizarInfoVariante($(this).val());
        });

        // Inicializar
        cargarTallas($('#color-select').val());
        });
    </script>
@endsection
