<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoRealizadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido;
    public $carrito;

    public function __construct(Pedido $pedido, $carrito)
    {
        $this->pedido = $pedido;
        $this->carrito = $carrito;
    }

    public function build()
    {
        return $this->subject('Nuevo pedido realizado')
                    ->view('emails.pedido_realizado');
    }
}
