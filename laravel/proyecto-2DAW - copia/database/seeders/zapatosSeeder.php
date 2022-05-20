<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class zapatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zapatos')->insert([
            [
                'categoria_zapatos' => 'zapatos de vestir',
                'color' => '#FFFFFF',
                'talla' => '42',
            ],
            [
                'categoria_zapatos' => 'chanclas',
                'color' => '#000000',
                'talla' => '41',
            ],
            [
                'categoria_zapatos' => 'zapatos de tacon',
                'color' => '#FF0000',
                'talla' => '37',
            ],
        ]);
    }
}
