@extends('layout.template1')

@section('title', 'Inicio | Belleza Femenina SV')

@section('estilos_css')
    <link href="{{ url('/css/home/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <p class="hero-subtitle">Fajas colombianas premium que moldean tu figura con elegancia y comodidad</p>
            <div class="hero-buttons">
                <a href="#productos" class="btn btn-primary">Ver Colección</a>
                <a href="#testimonios" class="btn btn-secondary">Experiencias</a>
            </div>
        </div>
    </section>

    <!-- Beneficios -->
    <section class="section">
        <h2 class="section-title">Nuestros Beneficios</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h3 class="benefit-title">Envíos Express</h3>
                <p>Recibe tus productos en 24-48 horas en todo El Salvador con seguimiento en tiempo real.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h3 class="benefit-title">Calidad Colombiana</h3>
                <p>Materiales premium importados directamente de Colombia para máxima durabilidad.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="benefit-title">Diseño Ergonómico</h3>
                <p>Moldea tu figura sin sacrificar comodidad con nuestros diseños pensados para ti.</p>
            </div>
        </div>
    </section>

    <!-- Productos -->
    <section id="productos" class="section products-section">
        <h2 class="section-title">Nuestra Colección</h2>
        <div class="products-grid">
            <div class="product-card">
                <img src="{{ asset('/img/faja1.png') }}" alt="Faja Postparto" class="product-image">
                <div class="product-info">
                    <h3 class="product-title">Faja Postparto</h3>
                    <p class="product-price">$49.99</p>
                    <p class="product-description">Recupera tu figura después del embarazo con total comodidad y soporte.</p>
                    <a href="#" class="btn btn-primary btn-sm">Ver Detalles</a>
                </div>
            </div>

            <div class="product-card">
                <img src="{{ asset('/img/faja1.png') }}" alt="Faja Postparto" class="product-image">
                <div class="product-info">
                    <h3 class="product-title">Faja Postparto</h3>
                    <p class="product-price">$49.99</p>
                    <p class="product-description">Recupera tu figura después del embarazo con total comodidad y soporte.</p>
                    <a href="#" class="btn btn-primary btn-sm">Ver Detalles</a>
                </div>
            </div>

            <div class="product-card">
                <img src="{{ asset('/img/faja1.png') }}" alt="Faja Postparto" class="product-image">
                <div class="product-info">
                    <h3 class="product-title">Faja Postparto</h3>
                    <p class="product-price">$49.99</p>
                    <p class="product-description">Recupera tu figura después del embarazo con total comodidad y soporte.</p>
                    <a href="#" class="btn btn-primary btn-sm">Ver Detalles</a>
                </div>
            </div>
            
            <!-- Más productos aquí -->
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonios" class="section">
        <div class="container">
            <h2 class="section-title">Ellas confían en nosotros</h2>
            <div class="testimonials-grid">
                <!-- Testimonio 1 -->
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Después de mi embarazo, esta faja fue mi mejor aliada. En un mes recuperé mi figura sin sentir incomodidad. La calidad superó mis expectativas."</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('img/perfil.webp') }}" alt="María G." class="author-image">
                            <div class="author-info">
                                <span class="author-name">María G.</span>
                                <span class="author-role">Cliente desde 2022</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 2 -->
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="testimonial-text">"Nunca había usado una faja tan cómoda. Puedo usarla todo el día en mi trabajo sin problemas. ¡Totalmente recomendada!"</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('img/perfil.webp') }}" alt="María G." class="author-image">
                            <div class="author-info">
                                <span class="author-name">Ana S.</span>
                                <span class="author-role">Cliente frecuente</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 3 -->
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Compré la faja postparto y los resultados fueron visibles en semanas. El servicio al cliente es excelente, me ayudaron a elegir mi talla."</p>
                        <div class="testimonial-author">
                            <img src="{{ asset('img/perfil.webp') }}" alt="María G." class="author-image">
                            <div class="author-info">
                                <span class="author-name">Carolina R.</span>
                                <span class="author-role">Primera compra</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/50375833922" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
@endsection