<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complementos extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_complementos',
        'talla'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
