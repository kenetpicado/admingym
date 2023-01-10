<?php

namespace App\Http\Livewire;

use App\Services\DateService;
use App\Services\IngresoService;
use App\Services\EgresoService;
use Livewire\Component;

class Estadisticas extends Component
{
    public function render()
    {
        $collectionIngresos = (new IngresoService)->getForStats();

        $ingresos = $collectionIngresos->map(function ($item, $key) {
            return [
                'mes' => (new DateService)->monthName($item->mes),
                'total' => $item->total
            ];
        });

        // for ($i = 1; $i <= 12; ++$i) {
        //     // $ingresos[$i] = DB::table('ingresos')
        //     //     ->whereYear('created_at', '2022')
        //     //     ->whereMonth('created_at', $i)
        //     //     ->sum('monto');

        //     array_push($ingresos, ['mes' => (new DateService)->monthName($i), 'total' => 2]);
        // }

        return view('livewire.estadisticas', [
            'ingresos' => $ingresos
        ]);
    }
}
