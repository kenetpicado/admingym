<?php

namespace App\Http\Livewire;

use App\Services\CollectionService;
use App\Services\DateService;
use App\Services\EgresoService;
use App\Services\IngresoService;
use Livewire\Component;

class Estadisticas extends Component
{
    public function render()
    {
        $ingresos = (new CollectionService)->setMonthName((new IngresoService)->getForStats());
        //$ingresos2023 = (new CollectionService)->setMonthName((new IngresoService)->getForStats(2023));

        return view('livewire.estadisticas', [
            'ingresos' => $ingresos,
            //'ingresos2023' => $ingresos2023
        ]);
    }
}
