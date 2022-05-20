<?php

namespace Database\Seeders;

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
                'imagen' => 'img/productos/1/img1.jpg',
                'img2' => 'img/productos/1/img2.jpg',
                'img3' => 'img/productos/1/img3.jpg',
                'img4' => 'img/productos/1/img4.jpg',
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
                'imagen' => 'img/productos/2/img1.jpg',
                'img2' => 'img/productos/2/img2.jpg',
                'img3' => 'img/productos/2/img3.jpg',
                'img4' => 'img/productos/2/img4.jpg',
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
                'imagen' => 'img/productos/3/img1.jpg',
                'img2' => 'img/productos/3/img2.jpg',
                'img3' => 'img/productos/3/img3.jpg',
                'img4' => 'img/productos/3/img4.jpg',
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
                'imagen' => 'img/productos/4/img1.jpg',
                'img2' => 'img/productos/4/img2.jpg',
                'img3' => 'img/productos/4/img3.jpg',
                'img4' => 'img/productos/4/img4.jpg',
                'etiquetas' => 'zapatos'
            ],
            [
                'titulo' => 'Sudadera 2',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'categoria_prenda' => 'sudadera con capucha',
                'genero' => 'masculino',
                'marca' => 'nike',
                'precio' => 18.99,
                'valoracion' => 4,
                'imagen' => 'img/productos/5/img1.jpg',
                'img2' => 'img/productos/5/img2.jpg',
                'img3' => 'img/productos/5/img3.jpg',
                'img4' => 'img/productos/5/img4.jpg',
                'etiquetas' => 'oversize'
            ]
        
            ]);
    }
}