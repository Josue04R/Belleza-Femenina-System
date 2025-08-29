<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Tienda')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="{{ url('/css/layout/template1.css') }}" rel="stylesheet">


     @yield('estilos_css')
</head>
<body>
    <!-- Navbar Elegante -->
    <nav class="navbar navbar-expand-lg customNavbar sticky-top">
        <div class="container">
            <!-- Marca -->
            <a class="navbar-brand navBrand" href="/">
                <i class="me-2"></i>Belleza Femenina
            </a>

            <!-- Botón para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido colapsable -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="row w-100 align-items-center">
                    <!-- Columna izquierda vacía para balancear -->
                    <div class="col-3"></div>

                    <!-- Buscador centrado -->
                    <div class="col-6">
                        <form class="d-flex justify-content-center" method="GET" action="{{route('buscar')}}">
                            <input class="form-control me-2 w-75" name="query" type="search" placeholder="Buscar productos..." aria-label="Buscar">
                            <button type="submit" class="custom-btn">Buscar</button>

                        </form>
                    </div>

                    <!-- Menú a la derecha -->
                    <div class="col-3">
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
                                <a class="nav-link navLink cartIcon" href="/carrito">
                                    <i class="bi bi-bag"></i>
                                    <span class="cartBadge">3</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="mainContent">      
            <!-- Espacio para tu contenido -->
        <div class="text-center">
                @yield('content')
        </div>
    </main>
    
    <!-- Footer Completo -->
    <footer class="customFooter">
        <div class="container">
            <div class="row text-center text-lg-start justify-content-center">
                <div class="col-12 col-lg-6 mb-4">
                    <h5 class="footerTitle">Belleza Femenina</h5>
                    <p class="mb-4">Ofreciendo productos exclusivos y de alta calidad con un estilo único y sofisticado.</p>
                    <div class="mt-4">
                        <a href="https://www.facebook.com/share/19t2FwHm9h/?mibextid=wwXIfr" class="socialIcon" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="https://www.instagram.com/bellezafemeninasv?igsh=MWEwNWF3ZmNqeHhlMg==" class="socialIcon" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="https://wa.me/50375833922" class="socialIcon" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3 mb-4">
                    <h5 class="footerTitle">Comprar</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a  class="footerLink">
                            <i class="bi bi-bag-fill me-2"></i> Fajas
                            </a>
                        </li>

                        <li class="mb-2">
                            <a class="footerLink">
                            <i class="bi bi-heart-fill me-2"></i> Brasiers
                            </a>
                        </li>

                        <li class="mb-2">
                            <a class="footerLink">
                            <i class="bi bi-gem me-2"></i> Accesorios femeninos
                            </a>
                        </li>

                        <li>
                            <a class="footerLink">
                            <i class="bi bi-three-dots me-2"></i> Y más ...
                            </a>
                        </li>

                    </ul>
                </div>
                
               <div class="col-6 col-lg-3 mb-4">
                    <h5 class="footerTitle">Ayuda</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('sobre_nosotros') }}" class="footerLink">Sobre Nosotros</a></li>
                        <li><a href="{{ route('preguntas_frecuentes') }}" class="footerLink">Preguntas Frecuentes</a></li>
                        <li><a href="{{ route('guia_tallas') }}" class="footerLink">Guía de tallas</a></li>
                    </ul>
                </div>

            </div>



            
            <hr class="my-4" style="border-color: rgba(255,255,255,0.15);">
            
           <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0 fw-bold" style="font-size: 1.1rem;">
                        &copy; 2025 Belleza Femenina. Todos los derechos reservados.
                    </p>
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