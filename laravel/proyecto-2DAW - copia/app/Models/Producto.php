<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'categoria_prenda',
        'genero',
        'marca',
        'precio',
        'valoracion',
        'imagen',
        'img2',
        'img3',
        'img4',
        'etiquetas',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
