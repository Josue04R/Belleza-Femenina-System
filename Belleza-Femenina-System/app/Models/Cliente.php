<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
