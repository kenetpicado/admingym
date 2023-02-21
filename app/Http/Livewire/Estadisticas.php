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
        return view('livewire.estadisticas');
    }
}
