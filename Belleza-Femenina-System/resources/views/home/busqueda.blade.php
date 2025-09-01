@extends('layout.template1') 

@section('estilos_css')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}" >
    <link rel="stylesheet" href="{{asset('/css/home/card.css')}}">
@endsection

@section('content')
    <div class="container mt-4">
        <h3>Resultados de búsqueda para: <span class="text-primary">{{ $query }}</span></h3>

        @if($productos->count() > 0)
            <div class="row mt-3">
                @foreach($productos as $producto)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-card position-relative">
                            <div class="product-img position-relative">
                                {{-- Mostrar la imagen del producto o imagen por defecto --}}
                                <img src="{{ $producto->imagen ?? asset('/img/faja1.png') }}" alt="{{ $producto->nombreProducto }}" class="img-fluid">
                                <div class="product-badge position-absolute">
                                    <span class="badge badge-new p-2">Nuevo</span>
                                </div>
                                <div class="product-actions position-absolute">
                                    <button class="action-btn" title="Agregar a favoritos">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <button class="action-btn" title="Ver detalles">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="p-4">
                                <h3 class="h5 fw-bold mb-1">{{ $producto->nombreProducto }}</h3>
                                <p class="small text-muted mb-2">{{ $producto->descripcion }}</p>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="product-price">
                                        <span class="fw-bold text-primary">${{ number_format($producto->precio, 2) }}</span>
                                    </div>
                                    <div class="product-rating text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <a href="{{ route('productos.show', $producto->idProducto) }}" class="btn btn-add-to-cart w-100 py-2">
                                    <i class="fas fa-shopping-bag me-2"></i> Comprar
                                </a>
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
