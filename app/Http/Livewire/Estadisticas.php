<?php

namespace App\Http\Livewire;

use App\Services\CollectionService;
use App\Services\IngresoService;
use App\Services\PlanService;
use Livewire\Component;

class Estadisticas extends Component
{
    public function render()
    {
        $ingresos2023 = (new CollectionService)->setMonthName((new IngresoService)->getForStats(2023));
        $plansLastDays = (new PlanService)->getLastDays();

        return view('livewire.estadisticas', [
            'plansLastDays' => $plansLastDays,
            'ingresos2023' => $ingresos2023
        ]);
    }
}
