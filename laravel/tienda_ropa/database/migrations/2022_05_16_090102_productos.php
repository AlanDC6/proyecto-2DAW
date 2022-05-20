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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('tipo');
            $table->string('categoria_prenda');
            $table->string('genero');
            $table->string('marca');
            $table->string('precio');
            $table->string('valoracion');
            $table->string('imagen');
            $table->string('img2');
            $table->string('img3');
            $table->string('img4');
            $table->string('etiquetas');
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
