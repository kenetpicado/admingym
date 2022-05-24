<?php

namespace Database\Seeders;

use App\Models\Precio;
use Illuminate\Database\Seeder;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Precio::create([
            'servicio' => 'PESAS',
            'plan' => 'MENSUAL',
            'monto' => '300'
        ]);

        Precio::create([
            'servicio' => 'PESAS',
            'plan' => 'QUINCENAL',
            'monto' => '200'
        ]);

        Precio::create([
            'servicio' => 'PESAS',
            'plan' => 'SEMANAL',
            'monto' => '150'
        ]);

        Precio::create([
            'servicio' => 'PESAS',
            'plan' => 'DIA',
            'monto' => '50'
        ]);

        Precio::create([
            'servicio' => 'ZUMBA',
            'plan' => 'MENSUAL',
            'monto' => '350'
        ]);

        Precio::create([
            'servicio' => 'ZUMBA+PESAS',
            'plan' => 'MENSUAL',
            'monto' => '550'
        ]);
    }
}
