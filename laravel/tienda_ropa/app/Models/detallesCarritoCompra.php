<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallesCarritoCompra extends Model
{
    protected $fillable = [
        'cantidad',
        'precio',
        'id_carrito',
        'id_producto'
    ];

    public function producto() {
        return $this->belongsTo(producto::class);
    }
}
