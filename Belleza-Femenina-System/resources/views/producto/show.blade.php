@extends('layout.template1')

@section('title', $producto->nombre_p . ' | Mi Tienda')

@section('estilos_css')
    <link rel="stylesheet" href="{{ url('/css/producto/productoShow.css') }}">
@endsection

@section('content')
    <div class="container py-5">
        <div class="producto-container">
            <div class="row align-items-center g-4">
                <!-- Imagen producto -->
                <div class="col-lg-5">
                    <div class="producto-img-wrapper">
                        <img src="{{ asset('/img/faja2.jpg') }}" alt="{{ $producto->nombre_p }}" class="producto-img">
                    </div>
                </div>

                <!-- Info producto -->
                <div class="col-lg-7 producto-info">
                    <h1 class="producto-titulo">{{ $producto->nombre_p }}</h1>
                    <p><strong>Marca:</strong> {{ $producto->marca_p }}</p>
                    <p><strong>Material:</strong> {{ $producto->material }}</p>
                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>

                    <div id="precio" class="producto-precio">
                        ${{ number_format($producto->variantes->first()->precio ?? 0, 2) }}
                    </div>
                    <small class="text-muted">Pago a plazos con tarjeta de crédito, $0.20 por plazo</small>

                    @php
                        $primeraVariante = $producto->variantes->first();
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
                        <input type="hidden" name="id_variante" id="id-variante" value="{{ $primeraVariante->id_variantes ?? '' }}">

                        <div class="row g-2">
                            <div class="col-md-6">
                                <select id="talla-select" name="talla" class="form-select">
                                    @foreach ($producto->variantes as $variante)
                                        <option value="{{ $variante->id_variantes }}">
                                            {{ $variante->talla->talla ?? 'Sin talla' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="cantidad" id="cantidad" class="form-control" 
                                    min="1" max="{{ $primeraVariante->stock ?? 1 }}" value="1" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-carrito mt-3">
                            Agregar al carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            let variantes = @json($producto->variantes->keyBy('id_variantes'));

            function actualizarInfoVariante(idVariante) {
                let variante = variantes[idVariante];
                if (variante) {
                    $('#color').text(variante.color);
                    $('#stock').text(variante.stock);
                    $('#id-variante').val(variante.id_variantes);
                    $('#precio').text(`$${parseFloat(variante.precio).toFixed(2)}`);

                    let maxStock = variante.stock > 0 ? variante.stock : 1;
                    $('#cantidad').attr('max', maxStock);
                    if ($('#cantidad').val() > maxStock) $('#cantidad').val(maxStock);
                    if ($('#cantidad').val() < 1) $('#cantidad').val(1);
                }
            }

            $('#talla-select').on('change', function() {
                actualizarInfoVariante($(this).val());
            });

            actualizarInfoVariante($('#talla-select').val());
        });
    </script>
@endsection
