<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoRealizadoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Instancia del pedido realizado.
     *
     * @var \App\Models\Pedido
     */
    public $pedido;

    /**
     * Contenido del carrito asociado al pedido.
     *
     * @var array
     */
    public $carrito;

    /**
     * Crea una nueva instancia del correo.
     *
     * @param \App\Models\Pedido $pedido
     * @param array $carrito
     */
    public function __construct(Pedido $pedido, $carrito)
    {
        $this->pedido = $pedido;
        $this->carrito = $carrito;
    }

    /**
     * Construye el contenido del correo.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('Nuevo pedido realizado')
                    ->view('emails.pedido_realizado');
    }
}