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

        return view('livewire.estadisticas', [
            'ingresos' => $ingresos
        ]);
    }
}
