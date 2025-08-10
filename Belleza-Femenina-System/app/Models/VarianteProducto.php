<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo VarianteProducto
 *
 * @property int $id_variantes
 * @property int $id_producto
 * @property int $id_talla
 * @property string $color
 * @property int $stock
 * @property float $precio
 */

class VarianteProducto extends Model
{
    protected $table = 'variantes_productos';

    protected $primaryKey = 'id_variantes';

    public $timestamps = true;

    protected $fillable = [
        'id_producto',
        'id_talla',
        'color',
        'stock',
        'precio',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'id_talla');
    }
}
