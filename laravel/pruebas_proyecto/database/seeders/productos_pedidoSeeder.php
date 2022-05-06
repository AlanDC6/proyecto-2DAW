<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productos_pedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos_pedido')->insert([
            [
                'id_pedido' => '1',
                'id_prenda' => '1'
            ],
            [
                'id_pedido' => '1',
                'id_prenda' => '2'
            ],
            [
                'id_pedido' => '1',
                'id_prenda' => '3'
            ],
            [
                'id_pedido' => '1',
                'id_prenda' => '4'
            ],
            [
                'id_pedido' => '2',
                'id_prenda' => '2'
            ],
            [
                'id_pedido' => '2',
                'id_prenda' => '4'
            ],
            [
                'id_pedido' => '3',
                'id_prenda' => '1'
            ],
        ]);
    }
}
