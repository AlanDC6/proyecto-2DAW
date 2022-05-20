<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_carrito_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->default(1);
            $table->decimal('precio');
            $table->unsignedBigInteger('id_carrito');
            $table->foreign('id_carrito')->references('id')->on('carritoCompra');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_carrito_compras');
    }
};
