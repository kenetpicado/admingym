<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 10; $i++) { 
            # code...
            Cliente::create([
                'nombre' => Str::random(10),
                'email' => Str::random(5) . '@gmail.com',
                'fecha' => date('Y-m-d'),
                'sexo' => 'F',
            ]);
        }
        
    }
}
