<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = [
        'clienteId',
        'empleadoId',
        'fecha',
        'direccion',
        'estado',
        'total',
        'observaciones'
    ];

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'pedidoId');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clienteId');
    }
}
