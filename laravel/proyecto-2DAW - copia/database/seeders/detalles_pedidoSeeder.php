<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class detalles_pedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detalles_pedido')->insert([
            [
                'nombre' => 'Alan',
                'apellidos' => 'Diaz Carrera',
                'pais' => 'España',
                'ciudad' => 'Gijon',
                'codigo_postal' => '33207',
                'direccion_calle' => 'Magnus Blikstad',
                'direccion2' => 'N9 6A',
                'telefono' => '622854082',
                'email' => 'alan@gmail.com',
                'otras_notas' => 'Entrga por las tardes',
            ],
            [
                'nombre' => 'Jose Manuel',
                'apellidos' => 'Cerra Vega',
                'pais' => 'España',
                'ciudad' => 'Oviedo',
                'codigo_postal' => '31207',
                'direccion_calle' => 'Uria',
                'direccion2' => 'N145 1A',
                'telefono' => '698354786',
                'email' => 'manuel@gmail.com',
                'otras_notas' => 'Entrega por las mañanas',
            ],
            [
                'nombre' => 'Silvia',
                'apellidos' => 'Diaz Carrera',
                'pais' => 'Italia',
                'ciudad' => 'Turin',
                'codigo_postal' => '55989',
                'direccion_calle' => 'Corssa Grande',
                'direccion2' => 'N365 3D',
                'telefono' => '697145530',
                'email' => 'silvia@gmail.com',
                'otras_notas' => '-',
            ],
        ]);
    }
}
