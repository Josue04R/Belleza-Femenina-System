<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Producto
 *
 * @property int $id_producto
 * @property string $nombre_p
 * @property string $marca_p
 * @property int $id_cate
 * @property string $material
 * @property string $descripcion
 * @property float $precio
 * @property string|null $imagen
 * @property string $estado
 */
class Producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey = 'idProducto';

    public $timestamps = true;

    protected $fillable = [
        'nombreProducto',
        'marcaProducto',
        'idCategoria',
        'material',
        'descripcion',
        'precio',
        'imagen',
        'estado',
    ];

    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    
    public function variantes()
    {
        return $this->hasMany(VarianteProducto::class, 'idProducto');
    }
}
