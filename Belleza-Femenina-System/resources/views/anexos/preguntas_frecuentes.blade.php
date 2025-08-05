@extends('layout.template1')

@section('title', 'Preguntas Frecuentes')

@section('estilos_css')
  <link href="{{ asset('css/anexos/preguntas_frecuentes.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="faq-section">
        <div class="container">
            <h2 class="section-title text-center">Preguntas Frecuentes</h2>

            <div class="accordion" id="faqAccordion">
                
                @for ($i = 1; $i <= 10; $i++)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $i }}">
                            <button class="accordion-button {{ $i != 1 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $i }}" aria-expanded="{{ $i == 1 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $i }}">
                                {{ $preguntas[$i - 1] }}
                            </button>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse {{ $i == 1 ? 'show' : '' }}"
                            aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $respuestas[$i - 1] }}
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="text-center mt-5">
                <h4 class="section-title">¿Tienes otra pregunta?</h4>
                <p>Contáctanos y con gusto te ayudaremos.</p>
                <a href="https://wa.me/50375833922" target="_blank" class="btn btn-purple btn-lg shadow">💬 Escríbenos por WhatsApp</a>
            </div>
        </div>
    </div>
@endsection