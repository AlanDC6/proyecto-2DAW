<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'pais',
        'ciudad',
        'codigo_postal',
        'direccion_calle',
        'direccion2',
        'telefono',
        'email',
        'otras_notas',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
