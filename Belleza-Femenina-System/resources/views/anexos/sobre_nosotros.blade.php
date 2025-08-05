@extends('layout.template1')

@section('title', 'Sobre Nosotros')

@section('estilos_css')
  <link href="{{ asset('css/anexos/sobre_nosotros.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="about-section">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <img src="{{ asset('img/ubicacion.png') }}" alt="Fajas Elegantes" class="about-img">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title mb-3">Nuestra Historia</h2>
                    <p class="text-muted">
                        <strong>Belleza Femenina</strong> nació con la misión de empoderar a las mujeres salvadoreñas ofreciéndoles productos de alta calidad que realcen su figura y confianza. Desde nuestros inicios, nos hemos enfocado en ofrecer <strong>fajas femeninas moldeadoras, reductoras y postparto</strong> para cada necesidad, con el objetivo de resaltar la belleza natural de cada clienta.
                    </p>
                    <p class="text-muted">
                        Nuestra tienda está ubicada en <strong>Barrio El Recreo, Santa Rosa de Lima, salida a Cantón Pasaquinita, segundo nivel de Agroservicio La Finca, La Unión Norte</strong>. Allí trabajamos día con día con compromiso, profesionalismo y pasión por lo que hacemos.
                    </p>
                </div>
            </div>

            <div class="row align-items-center flex-md-row-reverse mb-5">
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <img src="{{ asset('img/estilos.jpeg') }}" alt="Atención al cliente" class="about-img">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title mb-3">¿Por qué elegir Belleza Femenina?</h2>
                    <ul class="text-muted">
                        <li>✔️ Atención personalizada y cercana, porque cada clienta es única.</li>
                        <li>✔️ Envíos rápidos y seguros a todo El Salvador.</li>
                        <li>✔️ Amplia variedad en tallas, estilos, colores y necesidades especiales.</li>
                        <li>✔️ Productos cómodos, resistentes y con calidad garantizada.</li>
                        <li>✔️ Ubicación accesible en Santa Rosa de Lima, La Unión Norte.</li>
                    </ul>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="mission-box text-center">
                        <h4 class="section-title">Misión</h4>
                        <p class="text-muted">Ofrecer soluciones de control y estilo a mujeres salvadoreñas mediante fajas de alta calidad, que inspiren seguridad, bienestar y confianza en su día a día.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mission-box text-center">
                        <h4 class="section-title">Visión</h4>
                        <p class="text-muted">Convertirnos en la tienda líder de fajas femeninas en El Salvador, destacando por nuestra innovación, servicio personalizado y compromiso con la belleza integral.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mission-box text-center">
                        <h4 class="section-title">Valores</h4>
                        <p class="text-muted">Compromiso, respeto, calidad, empatía y pasión por resaltar la feminidad salvadoreña.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <h4 class="section-title mb-3">¿Lista para sentirte increíble?</h4>
                <p class="text-muted">Te esperamos con los brazos abiertos en nuestra tienda. ¡Ven y encuentra la faja perfecta para ti!</p>
                <a href="https://wa.me/50375833922" target="_blank" class="btn btn-lg btn-purple mt-3">💬 Escríbenos por WhatsApp</a>
            </div>
        </div>
    </div>

@endsection