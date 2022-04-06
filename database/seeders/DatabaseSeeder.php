<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Entrenador;
use App\Models\Evento;
use App\Models\Caja;
use App\Models\Ingreso;
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
        //$this->call(UserSeeder::class);
        Cliente::factory(20)->create();
        Entrenador::factory(10)->create();
        Evento::factory(20)->create();
        Caja::factory(20)->create();
        Ingreso::factory(20)->create();
    }
}
