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

    protected $primaryKey = 'id_producto';

    public $timestamps = true;

    protected $fillable = [
        'nombre_p',
        'marca_p',
        'id_cate',
        'material',
        'descripcion',
        'precio',
        'imagen',
        'estado',
    ];

    // Relación con categoría (asumiendo que tienes modelo Categoria)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_cate');
    }

    // Relación con variantes de producto (asumiendo que las tienes)
    public function variantes()
    {
        return $this->hasMany(VarianteProducto::class, 'id_producto');
    }
}
