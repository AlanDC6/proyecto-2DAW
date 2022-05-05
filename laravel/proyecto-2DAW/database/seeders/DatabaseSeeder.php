<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(productoSeeder::class);
        $this->call(usuarioSeeder::class);
        $this->call(complementosSeeder::class);
        $this->call(detalles_pedidoSeeder::class);
        $this->call(prendasSeeder::class);
        $this->call(productos_pedidoSeeder::class);
        $this->call(zapatosSeeder::class);
    }
}
