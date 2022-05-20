<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_pedido extends Model
{
    use HasFactory;

    protected $table = 'productos_pedido';

    protected $fillable = [
        'id_pedido',
        'id_prenda',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
