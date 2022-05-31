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
            $table->string('categoria_prenda')->nullable();
            $table->string('genero');
            $table->string('marca');
            $table->string('precio');
            $table->string('valoracion')->nullable()->default('5');
            $table->string('imagen')->default('img/productos/default.jpg');
            $table->string('img2')->default('img/productos/default.jpg');
            $table->string('img3')->default('img/productos/default.jpg');
            $table->string('img4')->default('img/productos/default.jpg');
            $table->string('etiquetas')->nullable()->default(null);
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