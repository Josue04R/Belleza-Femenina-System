<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi tienda</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/css/template1.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar Elegante -->
    <nav class="navbar navbar-expand-lg customNavbar sticky-top">
        <div class="container">
            <a class="navbar-brand navBrand" href="#">
                <i class="me-2"></i>Mi Tienda
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">   
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link navLink dropdown-toggle userDropdown" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> Mi Cuenta
                        </a>
                        <ul class="dropdown-menu dropdownMenu dropdown-menu-end">
                            <li><a class="dropdown-item dropdownItem" href="#"><i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesión</a></li>
                            <li><a class="dropdown-item dropdownItem" href="#"><i class="bi bi-person-plus me-2"></i> Registrarse</a></li>
                            <li><hr class="dropdown-divider dropdownDivider"></li>
                            <li><a class="dropdown-item dropdownItem" href="#"><i class="bi bi-person me-2"></i> Perfil</a></li>
                            <li><a class="dropdown-item dropdownItem" href="#"><i class="bi bi-heart me-2"></i> Favoritos</a></li>
                            <li><a class="dropdown-item dropdownItem" href="#"><i class="bi bi-box-arrow-left me-2"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link navLink cartIcon" href="#">
                            <i class="bi bi-bag"></i>
                            <span class="cartBadge">3</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Contenido principal -->
    <main class="mainContent">      
            <!-- Espacio para tu contenido -->
            <div class="text-center py-5">
                Donde va air todo
            </div>
        </div>
    </main>
    
    <!-- Footer Completo -->
    <footer class="customFooter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h5 class="footerTitle">Mi tienda</h5>
                    <p class="mb-4">Ofreciendo productos exclusivos y de alta calidad con un estilo único y sofisticado.</p>
                    <div class="mt-4">
                        <a href="#" class="socialIcon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="socialIcon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="socialIcon"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                    <h5 class="footerTitle">Comprar</h5>
                    <a href="#" class="footerLink">Camisas</a>
                    <a href="#" class="footerLink">Pantalones</a>
                    <a href="#" class="footerLink">Short</a>
                    <a href="#" class="footerLink">Pulseras</a>
                    <a href="#" class="footerLink">Faldas</a>
                </div>
                
                <div class="col-md-4 col-lg-2 mb-4 mb-md-0">
                    <h5 class="footerTitle">Ayuda</h5>
                    <a href="#" class="footerLink">Contacto</a>
                    <a href="#" class="footerLink">Envíos</a>
                    <a href="#" class="footerLink">Devoluciones</a>
                    <a href="#" class="footerLink">Preguntas</a>
                    <a href="#" class="footerLink">Guía de tallas</a>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <h5 class="footerTitle">Cotizar</h5>
                    <p class="mb-3">Suscríbete para recibir nuestras últimas novedades y ofertas exclusivas.</p>
                    <form class="mb-4">
                        <div class="input-group">
                            <input type="email" class="form-control newsletterInput" placeholder="Tu correo">
                            <button class="btn newsletterBtn" type="submit">Suscribir</button>
                        </div>
                    </form>
                    <div class="payment-methods">
                        <img src="https://via.placeholder.com/250x40?text=Payment+Methods" alt="Métodos de pago" class="img-fluid" style="border-radius: 5px;">
                    </div>
                </div>
            </div>
            
            <hr class="my-4" style="border-color: rgba(255,255,255,0.15);">
            
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="copyrightText mb-0">&copy; 2025 Mi Tienda. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="copyrightText me-3" style="text-decoration: none;">Términos</a>
                    <a href="#" class="copyrightText me-3" style="text-decoration: none;">Privacidad</a>
                    <a href="#" class="copyrightText" style="text-decoration: none;">Cookies</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>