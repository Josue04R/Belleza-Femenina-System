<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'idPedido'; 
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'idCliente',
        'idEmpleado',
        'fecha',
        'direccion',
        'estado',
        'total',
        'observaciones'
    ];

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'idPedido');
    }

}

