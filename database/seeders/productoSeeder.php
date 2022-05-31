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
                'titulo' => 'Sudadera',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'tipo' => 'ropa',
                'categoria_prenda' => 'sudadera con capucha',
                'genero' => 'masculino',
                'marca' => 'nike',
                'precio' => 18.99,
                'valoracion' => 4,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'oversize',
            ],
            [
                'titulo' => 'Pantalones',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'tipo' => 'ropa',
                'categoria_prenda' => 'pantalones',
                'genero' => 'masculino',
                'marca' => 'levis',
                'precio' => 25.99,
                'valoracion' => 3,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => '',
            ],
            [
                'titulo' => 'anillo',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'tipo' => 'complementos',
                'categoria_prenda' => 'complementos',
                'genero' => 'femenino',
                'marca' => 'pandora',
                'precio' => 84.99,
                'valoracion' => 5,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'anillo',
            ],
            [
                'titulo' => 'Nike air force 1',
                'descripcion' => 'Es una prenda de ropa con un color azul oscuro',
                'tipo' => 'calzado',
                'categoria_prenda' => 'zapatos',
                'genero' => 'unisex',
                'marca' => 'nike',
                'precio' => 100.99,
                'valoracion' => 5,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'zapatos',
            ],
            [
                'titulo' => 'Pendientes',
                'descripcion' => 'Pendientes de oro',
                'tipo' => 'complementos',
                'categoria_prenda' => 'complemento',
                'genero' => 'femenino',
                'marca' => 'tous',
                'precio' => 180.99,
                'valoracion' => 4,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'pendientes',
            ],
            [
                'titulo' => 'Adidas Forum Low',
                'descripcion' => 'Nuevas adidas formum en formato low color Blanco/azul',
                'tipo' => 'calzado',
                'categoria_prenda' => 'zapatos',
                'genero' => 'unisex',
                'marca' => 'adidas',
                'precio' => 99.99,
                'valoracion' => 5,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'zapatos',
            ],
            [
                'titulo' => 'Vans Old Skool',
                'descripcion' => 'Las miticas zapatillas de skater vans en su version en negro',
                'tipo' => 'calzado',
                'categoria_prenda' => 'zapatos',
                'genero' => 'unisex',
                'marca' => 'vans',
                'precio' => 39.99,
                'valoracion' => 5,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'zapatos',
            ],
            [
                'titulo' => 'Camiseta Tommy Hilfiger',
                'descripcion' => 'Camiseta basica de la marca Tommy Hilfiger',
                'tipo' => 'ropa',
                'categoria_prenda' => 'camiseta',
                'genero' => 'masculino',
                'marca' => 'Tommy Hilfiger',
                'precio' => 22.95,
                'valoracion' => 5,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'camiseta',
            ],
            [
                'titulo' => 'Falda vaquera',
                'descripcion' => 'khgjhfjh',
                'tipo' => 'ropa',
                'categoria_prenda' => 'falda',
                'genero' => 'femenino',
                'marca' => 'Calvin klein',
                'precio' => 21.48,
                'valoracion' => 5,
                'imagen' => 'img/productos/default.jpg',
                'img2' => 'img/productos/default.jpg',
                'img3' => 'img/productos/default.jpg',
                'img4' => 'img/productos/default.jpg',
                'etiquetas' => 'falda',
            ],

        ]);
    }
}