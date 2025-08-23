<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';
    
    protected $fillable = [
        'pedidoId',
        'varianteId',
        'cantidad',
        'precioUnitario',
        'subtotal'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedidoId');
    }

    public function variante()
    {
        return $this->belongsTo(VarianteProducto::class, 'varianteId');
    }
}
