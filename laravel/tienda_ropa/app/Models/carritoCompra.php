<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carritoCompra extends Model
{
    protected $fillable = [
        'estado',
        'user_id',
        'fecha_pedido'
    ];

    public function carritoCompraDetalles() {
        return $this->hasMany(detallesCarritoCompra::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
