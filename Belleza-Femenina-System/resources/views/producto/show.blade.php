@extends('layout.template1')

@section('title', $producto->nombre_p . ' | Mi Tienda')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <h1 class="mb-3">{{ $producto->nombre_p }}</h1>
                <p class="text-muted mb-1"><strong>Marca:</strong> {{ $producto->marca_p }}</p>
                <p class="text-muted mb-1"><strong>Material:</strong> {{ $producto->material }}</p>
                <p class="mb-4">{{ $producto->descripcion }}</p>

                <h4>Variantes disponibles (por talla):</h4>
                <select id="talla-select" name="talla" class="form-select mb-4">
                    @foreach ($producto->variantes as $variante)
                        <option value="{{ $variante->id_variantes }}">
                            {{ $variante->talla->talla ?? 'Sin talla' }}
                        </option>
                    @endforeach
                </select>

                <div id="info-variante" class="border rounded p-3 bg-light mb-4">
                    @php
                        $primeraVariante = $producto->variantes->first();
                    @endphp

                    @if($primeraVariante)
                        <p><strong>Color:</strong> <span id="color">{{ $primeraVariante->color }}</span></p>
                        <p><strong>Stock:</strong> <span id="stock">{{ $primeraVariante->stock }}</span></p>
                        <p><strong>Precio:</strong> $<span id="precio">{{ number_format($primeraVariante->precio, 2) }}</span></p>
                    @else
                        <p>No hay variantes disponibles para este producto.</p>
                    @endif
                </div>

                <form id="form-agregar-carrito" action="{{ route('carrito.agregar') }}" method="POST" class="d-flex align-items-center gap-3 flex-wrap">
                    @csrf
                    <input type="hidden" name="id_variante" id="id-variante" value="{{ $primeraVariante->id_variantes ?? '' }}">

                    <div class="input-group w-auto" style="min-width: 160px;">
                        <span class="input-group-text">Cantidad</span>
                        <input 
                            type="number" 
                            name="cantidad" 
                            id="cantidad" 
                            class="form-control" 
                            min="1" 
                            max="{{ $primeraVariante->stock ?? 1 }}" 
                            value="1" 
                            required 
                            oninput="
                                if(this.value > this.max) this.value = this.max;
                                if(this.value < this.min) this.value = this.min;
                            "
                        >
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-cart me-2"></i> Agregar al carrito
                    </button>
                </form>

                @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                @endif

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
                    $('#precio').text(parseFloat(variante.precio).toFixed(2));
                    $('#id-variante').val(variante.id_variantes);

                    let maxStock = variante.stock > 0 ? variante.stock : 1;
                    $('#cantidad').attr('max', maxStock);

                    if ($('#cantidad').val() > maxStock) {
                        $('#cantidad').val(maxStock);
                    }
                    if ($('#cantidad').val() < 1) {
                        $('#cantidad').val(1);
                    }
                }
            }

            $('#talla-select').on('change', function() {
                actualizarInfoVariante($(this).val());
            });

            // Inicializar con la primera variante
            actualizarInfoVariante($('#talla-select').val());
        });
    </script>

@endsection


@section('scripts')
    <!-- Bootstrap JS Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <!-- GSAP para animaciones -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="{{ url('/js/carrito/carrito.js') }}"></script>
@endsection
