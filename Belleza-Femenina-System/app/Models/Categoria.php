<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Categoria
 *
 * @property int $id_cate
 * @property string $categoria
 * @property string $descripcion
 */
class Categoria extends Model
{
    protected $table = 'categorias';

    protected $primaryKey = 'idCategoria';

    // Como tienes timestamps en la migración, no necesitas desactivar
    public $timestamps = true;

    protected $fillable = [
        'categoria',
        'descripcion',
    ];

    // Relación con productos (una categoría tiene muchos productos)
    public function productos()
    {
        return $this->hasMany(Producto::class, 'idCategoria');
    }
}
