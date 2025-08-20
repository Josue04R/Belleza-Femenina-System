@extends('layout.template1') 

@section('content')
<div class="container mt-4">
    <h3>Resultados de búsqueda para: <span class="text-primary">{{ $query }}</span></h3>

    @if($productos->count() > 0)
        <div class="row mt-3">
            @foreach($productos as $producto)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ $producto->imagen_url ?? 'https://via.placeholder.com/200' }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ Str::limit($producto->descripcion, 80) }}</p>
                            <p class="fw-bold text-success">${{ $producto->precio }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="mt-3">No se encontraron productos para tu búsqueda.</p>
    @endif
</div>
@endsection