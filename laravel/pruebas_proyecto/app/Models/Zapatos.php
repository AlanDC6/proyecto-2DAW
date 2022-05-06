<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapatos extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_zapatos',
        'color',
        'talla'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
