<?php

namespace App\Http\Livewire;

use App\Services\CollectionService;
use App\Services\DateService;
use App\Services\EgresoService;
use App\Services\IngresoService;
use App\Services\PlanService;
use Livewire\Component;

class Estadisticas extends Component
{
    public function render()
    {
        $plansLastDays = (new PlanService)->getLastDays();

        return view('livewire.estadisticas', [
            'plansLastDays' => $plansLastDays,
        ]);
    }
}
