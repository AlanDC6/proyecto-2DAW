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
        Schema::create('compraventas', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('nombre_producto');
            $table->string('descripcion_producto');
            $table->string('precio');
            $table->string('imagen')->default('img/compraventa/default.jpg');
            $table->string('contacto');
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
        //
    }
};