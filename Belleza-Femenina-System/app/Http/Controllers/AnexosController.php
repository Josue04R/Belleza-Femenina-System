<?php

namespace App\Http\Controllers;

class AnexosController extends Controller
{

    public function guia_tallas(){
        return view('anexos.guia_tallas');
    }
    
    public function preguntas_frecuentes(){

        $preguntas = [
            '¿Cuál es el tiempo de entrega de los productos?',
            '¿Cómo elijo la talla adecuada para mí?',
            '¿Puedo hacer devoluciones si el producto no me queda?',
            '¿Qué tipos de fajas ofrecen?',
            '¿Los productos son originales y de buena calidad?',
            '¿Cómo puedo pagar mis compras?',
            '¿Ofrecen envío a todo El Salvador?',
            '¿Cómo cuido y lavo mis fajas para que duren más?',
            '¿Puedo combinar diferentes estilos y tallas en un solo pedido?',
            '¿Tienen promociones o descuentos especiales?',
        ];

        $respuestas = [
            'Los envíos son rápidos y seguros a todo El Salvador, generalmente entregamos en un plazo de 2 a 4 días hábiles.',
            'Te recomendamos revisar nuestra tabla de tallas disponible en cada producto. Si tienes dudas, contáctanos para asesoría personalizada y recomendaciones según tu medida.',
            'Sí, aceptamos devoluciones dentro de los 7 días siguientes a la entrega, siempre que el producto esté en condiciones originales, sin uso y con su empaque intacto.',
            'Ofrecemos fajas moldeadoras, reductoras, postparto, deportivas y de control ligero para diferentes necesidades y estilos de vida.',
            'Sí, trabajamos únicamente con proveedores confiables que garantizan productos 100% originales, cómodos y duraderos.',
            'Aceptamos pagos por transferencia bancaria, depósitos, y pago a través de nuestra línea de WhatsApp para mayor comodidad.',
            'Sí, realizamos envíos rápidos y seguros a todas las zonas del país, incluyendo áreas urbanas y rurales.',
            'Recomendamos lavar a mano con jabón suave, evitar el uso de blanqueadores y secar a la sombra para mantener la elasticidad y color.',
            'Sí, puedes seleccionar distintos estilos y tallas en un mismo pedido para adaptarlo a tus necesidades.',
            'Sí, periódicamente ofrecemos promociones especiales. Síguenos en redes sociales y contáctanos para estar al día con nuestras ofertas.',
        ];

        return view('anexos.preguntas_frecuentes',compact('preguntas','respuestas'));
    }

    public function sobre_nosotros(){
        return view('anexos.sobre_nosotros');
    }
}