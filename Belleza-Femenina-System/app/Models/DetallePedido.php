<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';
    protected $primaryKey = 'idDetallePedido';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'idPedido',
        'id_variantes',
        'cantidad',
        'precioUnitario',
        'subtotal'
    ];

    public function variante()
    {
        return $this->belongsTo(VarianteProducto::class, 'id_variantes');
    }
}
