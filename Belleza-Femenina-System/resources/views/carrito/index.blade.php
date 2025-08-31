@extends('layout.template1')

@section('title', 'Carrito de Compras')

@section('estilos_css')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ url('/css/carrito/carrito.css') }}">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="main-container animate_animated animate_fadeIn">
            <!-- Encabezao del carrito -->
            <div class="cart-header animate_animated animate_fadeInDown">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0 fw-bold"><i class="fas fa-shopping-cart me-2"></i>Tu Carrito</h2>
                    <a class="text-white fw-medium d-flex align-items-center" href="/productos" style="text-decoration: none;">
                        <i class="fas fa-arrow-left me-2"></i>
                        <span>Seguir comprando</span>
                    </a>
                </div>
            </div>
            
            <div class="row g-4 p-4">
                <!-- Productos -->
                <div class="col-lg-8">
                    @forelse($carrito as $producto)
                    <div class="cart-item animate_animated animate_fadeInLeft bg-white">
                        <div class="card-body d-flex flex-column flex-md-row align-items-center p-4">
                            <div class="position-relative me-md-4 mb-3 mb-md-0">
                                <img src="{{ $producto['imagen'] ?? 'https://www.encantolatino.com.do/wp-content/uploads/2023/05/faja-colombiana-republica-dominicana.jpg' }}" 
                                    alt="{{ $producto['producto'] }}" 
                                    class="cart-item-img img-loading">
                                <!-- Aquí puedes agregar badges si tienes info -->
                            </div>
                            <div class="flex-grow-1 w-100">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="productCardTitle mb-2">
                                            <a href="#" class="text-decoration-none">{{ $producto['producto'] }}</a>
                                        </h4>
                                        <div class="text-muted small mb-2">
                                            <i class="fas fa-ruler-combined me-1"></i>Talla: {{ $producto['talla'] }} | 
                                            <i class="fas fa-palette me-1"></i>Color: {{ $producto['color'] }}
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="price-text fs-4 me-3">${{ number_format($producto['precio'], 2) }}</div>
                                            <small class="text-success"><i class="fas fa-check-circle me-1"></i>En stock</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-danger btn-sm rounded-circle" type="button">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="d-flex align-items-center action-buttons gap-3">
                                    <div class="input-group" style="max-width: 120px;">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                        <input type="text" class="form-control text-center quantity-input" value="{{ $producto['cantidad'] }}">
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                    <form action="{{ route('producto.editar', $producto['idVariante']) }}" method="GET" style="display: inline;">
                                        <button class="btn btn-outline-primary btn-action" type="submit">
                                            <i class="fas fa-sync-alt me-1"></i>Actualizar
                                        </button>
                                    </form>
                                    <form action="{{ route('carrito.eliminar', $producto['idVariante']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button class="btn btn-outline-danger btn-action" type="submit">
                                            <i class="fas fa-trash-alt me-1"></i>Eliminar
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No tienes productos en el carrito.</p>
                    @endforelse

                    <!-- Cupón de regalo -->
                    <div class="card border-0 shadow-sm mb-4 animate_animated animate_fadeInUp">
                        <div class="card-body p-4 bg-white rounded-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-light rounded-circle p-3 me-3">
                                    <i class="fas fa-gift text-primary fa-2x"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">¿Tienes un cupón de regalo?</h5>
                                    <p class="text-muted mb-2">Ingresa el código para aplicar descuentos</p>
                                    <div class="input-group promo-input-group">
                                        <input type="text" class="form-control" placeholder="Código de cupón">
                                        <button class="btn btn-primary" type="button">Aplicar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Resumen del pedido -->
                <div class="col-lg-4">
                    <div class="summary-card sticky-top animate_animated animate_fadeInRight" style="top: 20px;">
                        <div class="summary-header">
                            <h4 class="fw-bold mb-0"><i class="fas fa-receipt me-2"></i>Resumen del Pedido</h4>
                        </div>
                        <div class="card-body p-4">
                            @php
                                $subtotal = 0;
                                foreach($carrito as $producto) {
                                    $subtotal += $producto['precio'] * $producto['cantidad'];
                                }
                            @endphp
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Subtotal ({{ count($carrito) }} items)</span>
                                <span class="fw-bold">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Envío</span>
                                <span class="fw-bold text-success">Gratis</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-bold">Total</span>
                                <div class="total-price">${{ number_format($subtotal, 2) }}</div>
                            </div>
                            
                            @if (Session::get('cliente_nombre') != null)
                                <a href="{{ route('checkout.create') }}" class="btn btn-primary btn-lg w-100 mb-3 pulse-effect">
                                    <i class="fas fa-credit-card me-2"></i>Proceder pedido
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100 mb-3 pulse-effect">
                                    <i class="fas fa-credit-card me-2"></i>Proceder pedido
                                </a>

                            @endif
                                        
                            <div class="alert alert-success mt-3">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong>¡Envío gratis disponible!</strong> Aplica para pedidos superiores a $100.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
