<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Cliente
 *
 * @property int $idCliente
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $telefono
 * @property string $password
 */
class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'clientes';
    protected $primaryKey = 'idCliente';
    protected $keyType = 'int';
    public $incrementing = true;

    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'password'];
    protected $hidden = ['password', 'created_at', 'updated_at'];
}