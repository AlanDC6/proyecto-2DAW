<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class prendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prendas')->insert([
            [
                'categoria_ropa' => 'sudadera con capucha',
                'color' => '#252850',
                'talla' => 'L',
            ],
            [
                'categoria_ropa' => 'camiseta oversize',
                'color' => '#FFFFFF',
                'talla' => 'M',
            ],
            [
                'categoria_ropa' => 'chaleco',
                'color' => '#FF0000',
                'talla' => 'XL',
            ],
        ]);
    }
}
