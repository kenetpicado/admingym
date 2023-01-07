<?php

namespace App\Http\Livewire;

use App\Models\Egreso;
use App\Models\Ingreso;
use App\Services\ClienteService;
use App\Services\DateService;
use App\Services\EgresoService;
use App\Services\IngresoService;
use App\Services\PercentageService;
use App\Services\PlanService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $planes = (new PlanService)->groupByServicio();

        $planes_month = (new PlanService)->getLastDays();

        $clientes = (new ClienteService)->groupBySexo();

        $ingresos = (new IngresoService)->getThisMonth();

        $egresos = (new EgresoService)->getThisMonth();

        //Build array
        $ver = ([
            'clientes'      => $clientes->sum('total'),
            'planes'        => $planes->sum('total'),
            'ingresos'      => $ingresos->sum('monto'),
            'egresos'       => $egresos,
            'sum_becas'     => $ingresos->sum('beca'),
            'count_becas'   => $ingresos->where('beca', '>', '0')->count(),
            'mes'           => (new DateService)->current_month(),
            'activos'       => (new PercentageService)->get($clientes->sum('total'), $planes->sum('total')),
        ]);

        return view('livewire.home', compact('ver', 'planes', 'clientes', 'planes_month'));
    }
}
