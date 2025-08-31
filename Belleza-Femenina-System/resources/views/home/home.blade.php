@extends('layout.template1')

@section('estilos_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/css/home/card.css')}}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section" 
    style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('{{ asset('img/foto-belleza-femenina.jpg') }}'); 
           background-size: cover; 
           background-position: center;">
    <div class="hero-overlay"></div>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-3 fw-bold text-white mb-4">Nueva Colección Primavera 2023</h1>
                <p class="lead text-white mb-5">Descubre las últimas tendencias en moda femenina</p>
                <a href="#productos" class="custom-btn2" style="color: white;">Ver Colección</a>
            </div>
        </div>
    </div>

</section>

<!-- Categorías -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Explora Nuestras Categorías</h2>
        </div>
        <div class="row g-4">
            <!-- Ejemplo de categoría -->
            <div class="col-md-3 col-6">
                <a href="#" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=687&q=80" alt="Vestidos" class="img-fluid">
                    </div>
                    <h3 class="category-title text-center mt-3">Vestidos</h3>
                </a>
            </div>
            <!-- Puedes repetir más categorías -->
        </div>
    </div>
</section>

<!-- Productos Destacados -->
<section id="productos" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Lo Más Vendido</h2>
            <p class="text-muted">Descubre los favoritos de nuestras clientas</p>
        </div>
        
        <div class="row g-4">
            @foreach ($productos as $item)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-card position-relative">
                        <div class="product-img position-relative">
                            {{-- Aquí mostramos la imagen del producto o una default si no existe --}}
                            <img src="{{ $item->imagen ?? asset('/img/faja1.png') }}" alt="{{ $item->nombreProducto }}" class="img-fluid">
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
                            <h3 class="h5 fw-bold mb-1">{{ $item->nombreProducto }}</h3>
                            <p class="small text-muted mb-2">{{ $item->descripcion }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="product-price">
                                    <span class="fw-bold text-primary">${{ number_format($item->precio, 2) }}</span>
                                </div>
                                <div class="product-rating text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <a href="{{ route('productos.show', $item->idProducto) }}" class="btn btn-add-to-cart w-100 py-2">
                                <i class="fas fa-shopping-bag me-2"></i> Comprar
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('productos') }}" class="custom-btn">Ver Todos los Productos</a>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script>
    document.querySelectorAll('.size-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
        });
    });

    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            alert('Funcionalidad en desarrollo');
        });
    });
</script>
@endsection
