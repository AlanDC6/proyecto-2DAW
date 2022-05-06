<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class complementosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('complementos')->insert([
            [
                'categoria_complementos' => 'anillo',
                'talla' => 'L',
            ],
            [
                'categoria_complementos' => 'collar',
                'talla' => 'M',
            ],
            [
                'categoria_complementos' => 'pendiente',
                'talla' => 'S',
            ],
        ]);
    }
}
