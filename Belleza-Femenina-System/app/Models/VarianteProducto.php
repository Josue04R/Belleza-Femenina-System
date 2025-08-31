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
    protected $table = 'variantesProducto';

    protected $primaryKey = 'idVariante';

    public $timestamps = false;

    protected $fillable = [
        'idProducto',
        'idTalla',
        'color',
        'stock',
        'precio',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'idTalla');
    }
}
