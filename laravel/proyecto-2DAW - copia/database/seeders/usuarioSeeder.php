<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Alan',
                'apellidos' => 'Diaz Carrera',
                'email' => 'alan@gmail.com',
                'contraseña' => 'alan',
                'genero' => 'hombre'
            ],
            [
                'nombre' => 'Silvia',
                'apellidos' => 'Diaz Carrera',
                'email' => 'silvia@gmail.com',
                'contraseña' => 'silvia',
                'genero' => 'mujer'
            ],
            [
                'nombre' => 'Jose Manuel',
                'apellidos' => 'Cerra Vega',
                'email' => 'manuel@gmail.com',
                'contraseña' => 'manuel',
                'genero' => 'hombre'
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Barrientos Vincelle',
                'email' => 'luis@gmail.com',
                'contraseña' => 'luis',
                'genero' => 'hombre'
            ],
            [
                'nombre' => 'Ana Belen',
                'apellidos' => 'Carrera Garcia',
                'email' => 'ana@gmail.com',
                'contraseña' => 'ana',
                'genero' => 'mujer'
            ],
        ]);
    }
}
