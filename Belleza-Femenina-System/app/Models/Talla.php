<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Talla
 *
 * @property int $id_talla
 * @property string $talla
 */
class Talla extends Model
{
    protected $table = 'tallas';

    protected $primaryKey = 'id_talla';

    public $timestamps = true;

    protected $fillable = ['talla'];

    public function variantes()
    {
        return $this->hasMany(VarianteProducto::class, 'id_talla');
    }
    
}
