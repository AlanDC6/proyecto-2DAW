<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            [
                'titulo' => 'Sudadera 1',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'categoria_prenda' => 'sudadera con capucha',
                'genero' => 'masculino',
                'marca' => 'nike',
                'precio' => 18.99,
                'valoracion' => 4,
                'imagen' => '',
                'img2' => '',
                'img3' => '',
                'img4' => '',
                'etiquetas' => 'oversize'
            ],
            [
                'titulo' => 'Pantalones',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'categoria_prenda' => 'pantalones',
                'genero' => 'femenino',
                'marca' => 'levis',
                'precio' => 25.99,
                'valoracion' => 3,
                'imagen' => '',
                'img2' => '',
                'img3' => '',
                'img4' => '',
                'etiquetas' => 'fitmom'
            ],
            [
                'titulo' => 'anillo',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'categoria_prenda' => 'complementos',
                'genero' => 'femenino',
                'marca' => 'pandora',
                'precio' => 84.99,
                'valoracion' => 5,
                'imagen' => '',
                'img2' => '',
                'img3' => '',
                'img4' => '',
                'etiquetas' => 'anillo'
            ],
            [
                'titulo' => 'NIke air force 1',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'categoria_prenda' => 'zapatos',
                'genero' => 'unisex',
                'marca' => 'nike',
                'precio' => 100.99,
                'valoracion' => 5,
                'imagen' => '',
                'img2' => '',
                'img3' => '',
                'img4' => '',
                'etiquetas' => 'zapatos'
            ]
        
            ]);
    }
}
