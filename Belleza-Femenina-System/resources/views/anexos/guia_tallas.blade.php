@extends('layout.template1')

@section('title', 'Guia de tallas')

@section('estilos_css')
  <link href="{{ asset('css/anexos/guia_tallas.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1 class="section-title text-center">GUIA DE TALLAS</h1>

        <h2 class="text-center">¿Cómo elegir la talla adecuada de mi faja? </h2>

        <p>Sabemos que elegir la talla adecuada para tu faja no es tarea fácil, por eso siempre que necesites asesoría personalizada, nos puedes contactar a nuestro <a href="https://wa.me/50375833922" target="_blank" >WhatsApp</a> o seguir las siguientes recomendaciones: </p>

        <p>Es importante que tengas en cuenta que la talla de tu faja puede variar según tu gusto, ya que hay muchas mujeres que están acostumbras a usar faja y cada vez quieren ponerse una una talla más pequeña porque van reduciendo medidas o su cuerpo se va moldeando, dándole horma a la figura, lo que permite que el tallaje sea menor. Por lo anterior, si es la primera vez que vas a usar fajas, elige una talla más grande
            Incrementa el uso de la prenda gradualmente para que tu cuerpo se vaya adaptando al nivel de compresión
            Si estas entre dos tallas, te recomendamos que elijas la más grande
            Por último, sigue con atención los pasos que te damos a continuación para saber cuál es tu talla.</p>

        <h3 class="text-center">Guia de talla de fajas</h3>
        <p class="text-center">Puedes guiarte según la talla de tu pantalón o según la siguiente tabla de medidas:</p>

        <img src="{{asset('/img/1.png')}}" width="1000px" alt="talla 1">

        <h3 class="text-center">Guía de tallas Fajas Reloj de Arena</h3>
        <p class="text-center">ecuerda que estas fajas son para cuerpos con cintura ultra pequeña, caderas y piernas extra grandes. </p>
        <p class="text-center">Puedes guiarte según la talla de tu pantalón o según la siguiente tabla de medidas:</p>

        <img src="{{asset('/img/2.png')}}" width="1000px" alt="talla 2">

        <h3 class="text-center">Guía de tallas para Brasieres</h3>
        <img src="{{asset('/img/4.png')}}" width="1000px" alt="talla 2">

    </div>
   

@endsection