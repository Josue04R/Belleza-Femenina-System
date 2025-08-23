@extends('layout.template1')
@section('estilos_css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
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
                <a href="#productos" class="btn btn-primary btn-lg px-5 py-3">Ver Colección</a>
            </div>
        </div>
    </div>

<p>Bienvenido, {{ Session::get('cliente_nombre') }} (ID: {{ Session::get('cliente_id') }})</p>

</section>


<!-- Categorías -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Explora Nuestras Categorías</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <a href="#" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Vestidos" class="img-fluid">
                    </div>
                    <h3 class="category-title text-center mt-3">Vestidos</h3>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="#" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=736&q=80" alt="Blusas" class="img-fluid">
                    </div>
                    <h3 class="category-title text-center mt-3">Blusas</h3>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="#" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1520367445093-50dc08a59d9d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Pantalones" class="img-fluid">
                    </div>
                    <h3 class="category-title text-center mt-3">Pantalones</h3>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="#" class="category-card">
                    <div class="category-img">
                        <img src="https://images.unsplash.com/photo-1607346256330-dee7af15f7c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=702&q=80" alt="Accesorios" class="img-fluid">
                    </div>
                    <h3 class="category-title text-center mt-3">Accesorios</h3>
                </a>
            </div>
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
                            <img src="{{ asset('/img/faja1.png') }}" alt="{{ $item->nombre_p }}" class="img-fluid">
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
                            <h3 class="h5 fw-bold mb-1">{{ $item->nombre_p }}</h3>
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
                            <a href="{{ route('productos.show', $item->id_producto) }}" class="btn btn-add-to-cart w-100 py-2">
                                <i class="fas fa-shopping-bag me-2"></i> Comprar
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <!-- cierre del row -->

        <div class="text-center mt-5">
            <a href="{{route('productos')}}" class="btn btn-outline-primary btn-lg">Ver Todos los Productos</a>
        </div>
    </div>
</section>


<!-- Testimonios -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Opiniones de Nuestras Clientes</h2>
            <p class="text-muted">Lo que dicen quienes ya compraron con nosotros</p>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-rating mb-3">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                    </div>
                    <p class="testimonial-text mb-4">"La calidad de los vestidos superó mis expectativas. Definitivamente volveré a comprar aquí."</p>
                    <div class="testimonial-author d-flex align-items-center">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="María González" class="rounded-circle me-3" width="50">
                        <div>
                            <h5 class="mb-0">María González</h5>
                            <small class="text-muted">San Salvador</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Más testimonios -->
            
        </div>
    </div>
</section>

<!-- Instagram Feed -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Síguenos en Instagram</h2>
            <p class="text-muted">@ModaFemeninaSV</p>
        </div>
        
        <div class="row g-2">
            <div class="col-md-2 col-4">
                <a href="#" class="instagram-post">
                    <img src="https://images.unsplash.com/photo-1490114538077-0a7f8cb49891?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Instagram Post" class="img-fluid">
                    <div class="instagram-overlay">
                        <i class="fab fa-instagram"></i>
                    </div>
                </a>
            </div>
            
            <!-- Más posts de Instagram -->
            
        </div>
    </div>
</section>

  <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Funcionalidad básica para demostración
        document.querySelectorAll('.size-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.size-option').forEach(opt => {
                    opt.classList.remove('active');
                });
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
