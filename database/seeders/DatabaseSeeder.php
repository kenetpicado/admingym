<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Entrenador;
use App\Models\Evento;
use App\Models\Caja;
use App\Models\Ingreso;
use App\Models\Peso;
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
        //$this->call(ClienteSeeder::class);
        Cliente::factory(15)->create();
        Entrenador::factory(15)->create();
        Evento::factory(30)->create();
        Peso::factory(30)->create();
        // Caja::factory(20)->create();
    }
}
