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
    <div class="main-container animate__animated animate__fadeIn">
        <!-- Encabezado del carrito -->
        <div class="cart-header animate__animated animate__fadeInDown">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0 fw-bold"><i class="fas fa-shopping-cart me-2"></i>Tu Carrito</h2>
                <a class="text-white fw-medium d-flex align-items-center" href="#" style="text-decoration: none;">
                    <i class="fas fa-arrow-left me-2"></i>
                    <span>Seguir comprando</span>
                </a>
            </div>
        </div>
        
        <div class="row g-4 p-4">
            <!-- Productos -->
            <div class="col-lg-8">
                <!-- Producto 1 -->
                <div class="cart-item animate__animated animate__fadeInLeft bg-white">
                    <div class="card-body d-flex flex-column flex-md-row align-items-center p-4">
                        <div class="position-relative me-md-4 mb-3 mb-md-0">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2hvZXN8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" 
                                 alt="Zapatos Calvin Klein" 
                                 class="cart-item-img img-loading">
                            <span class="badge bg-primary position-absolute top-0 start-0 translate-middle-y ms-2 px-3 py-2 rounded-pill">Nuevo</span>
                        </div>
                        <div class="flex-grow-1 w-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="productCardTitle mb-2"><a href="#" class="text-decoration-none">Calvin Klein Jeans Keds</a></h4>
                                    <div class="text-muted small mb-2"><i class="fas fa-ruler-combined me-1"></i>Talla: 8.5 | <i class="fas fa-palette me-1"></i>Color: Negro</div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="price-text fs-4 me-3">$125.00</div>
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
                                    <input type="text" class="form-control text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                                <button class="btn btn-outline-primary btn-action" type="button">
                                    <i class="fas fa-sync-alt me-1"></i>Actualizar
                                </button>
                                <button class="btn btn-outline-danger btn-action" type="button">
                                    <i class="fas fa-trash-alt me-1"></i>Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Producto 2 -->
                <div class="cart-item animate__animated animate__fadeInLeft bg-white" style="animation-delay: 0.1s;">
                    <div class="card-body d-flex flex-column flex-md-row align-items-center p-4">
                        <div class="position-relative me-md-4 mb-3 mb-md-0">
                            <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG9vZGllfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" 
                                 alt="Hoodie The North Face" 
                                 class="cart-item-img img-loading">
                            <span class="badge bg-success position-absolute top-0 start-0 translate-middle-y ms-2 px-3 py-2 rounded-pill">-20%</span>
                        </div>
                        <div class="flex-grow-1 w-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="productCardTitle mb-2"><a href="#" class="text-decoration-none">The North Face Hoodie</a></h4>
                                    <div class="text-muted small mb-2"><i class="fas fa-ruler-combined me-1"></i>Talla: XL | <i class="fas fa-palette me-1"></i>Color: Gris</div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="price-text fs-4 me-3">$134.00</div>
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
                                    <input type="text" class="form-control text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                                <button class="btn btn-outline-primary btn-action" type="button">
                                    <i class="fas fa-sync-alt me-1"></i>Actualizar
                                </button>
                                <button class="btn btn-outline-danger btn-action" type="button">
                                    <i class="fas fa-trash-alt me-1"></i>Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Producto 3 -->
                <div class="cart-item animate__animated animate__fadeInLeft bg-white" style="animation-delay: 0.2s;">
                    <div class="card-body d-flex flex-column flex-md-row align-items-center p-4">
                        <div class="position-relative me-md-4 mb-3 mb-md-0">
                            <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8c3VuZ2xhc3Nlc3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" 
                                 alt="Gafas Medicine" 
                                 class="cart-item-img img-loading">
                            <span class="badge bg-warning text-dark position-absolute top-0 start-0 translate-middle-y ms-2 px-3 py-2 rounded-pill">Popular</span>
                        </div>
                        <div class="flex-grow-1 w-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="productCardTitle mb-2"><a href="#" class="text-decoration-none">Gafas Medicine Chameleon</a></h4>
                                    <div class="text-muted small mb-2"><i class="fas fa-glasses me-1"></i>Lentes: Camaleón | <i class="fas fa-palette me-1"></i>Armazón: Gris / Negro</div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="price-text fs-4 me-3">$47.00</div>
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
                                    <input type="text" class="form-control text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                                <button class="btn btn-outline-primary btn-action" type="button">
                                    <i class="fas fa-sync-alt me-1"></i>Actualizar
                                </button>
                                <button class="btn btn-outline-danger btn-action" type="button">
                                    <i class="fas fa-trash-alt me-1"></i>Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Producto 4 -->
                <div class="cart-item animate__animated animate__fadeInLeft bg-white" style="animation-delay: 0.3s;">
                    <div class="card-body d-flex flex-column flex-md-row align-items-center p-4">
                        <div class="position-relative me-md-4 mb-3 mb-md-0">
                            <img src="https://images.unsplash.com/photo-1575428652377-a2d80e2277fc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2FwfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" 
                                 alt="Gorra Adidas" 
                                 class="cart-item-img img-loading">
                            <span class="badge bg-info position-absolute top-0 start-0 translate-middle-y ms-2 px-3 py-2 rounded-pill">Oferta</span>
                        </div>
                        <div class="flex-grow-1 w-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="productCardTitle mb-2"><a href="#" class="text-decoration-none">Gorra Adidas Performance</a></h4>
                                    <div class="text-muted small mb-2"><i class="fas fa-tshirt me-1"></i>Material: Acrílico | <i class="fas fa-palette me-1"></i>Color: Rosa / Verde oscuro</div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="price-text fs-4 me-3">$19.00</div>
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
                                    <input type="text" class="form-control text-center quantity-input" value="1">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                                <button class="btn btn-outline-primary btn-action" type="button">
                                    <i class="fas fa-sync-alt me-1"></i>Actualizar
                                </button>
                                <button class="btn btn-outline-danger btn-action" type="button">
                                    <i class="fas fa-trash-alt me-1"></i>Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Cupón de regalo -->
                <div class="card border-0 shadow-sm mb-4 animate__animated animate__fadeInUp">
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
                <div class="summary-card sticky-top animate__animated animate__fadeInRight" style="top: 20px;">
                    <div class="summary-header">
                        <h4 class="fw-bold mb-0"><i class="fas fa-receipt me-2"></i>Resumen del Pedido</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Subtotal (4 items)</span>
                            <span class="fw-bold">$325.00</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Envío</span>
                            <span class="fw-bold text-success">Gratis</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Descuento</span>
                            <span class="fw-bold text-danger">-$20.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="fw-bold">Total</span>
                            <div class="total-price">$305.00</div>
                        </div>
                        
                        <button class="btn btn-primary btn-lg w-100 mb-3 pulse-effect">
                            <i class="fas fa-credit-card me-2"></i>Proceder al pago
                        </button>
                        
                        <div class="text-center mb-4">
                            <img src="https://via.placeholder.com/300x50?text=Secure+Payments" alt="Métodos de pago" class="img-fluid">
                        </div>
                        
                        <div class="accordion mb-3" id="shippingAccordion">
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#shippingInfo">
                                        <i class="fas fa-truck me-2"></i>Estimación de envío
                                    </button>
                                </h2>
                                <div id="shippingInfo" class="accordion-collapse collapse" data-bs-parent="#shippingAccordion">
                                    <div class="accordion-body p-3">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">País</label>
                                                <select class="form-select">
                                                    <option>México</option>
                                                    <option>Estados Unidos</option>
                                                    <option>España</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Código Postal</label>
                                                <input type="text" class="form-control" placeholder="Ej. 28001">
                                            </div>
                                            <button type="button" class="btn btn-outline-primary w-100 shipping-btn">
                                                Calcular envío
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="fas fa-edit me-2"></i>Notas adicionales</label>
                            <textarea class="form-control note-textarea" placeholder="Instrucciones especiales, notas para el pedido..."></textarea>
                        </div>
                        
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