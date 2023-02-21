<?php

namespace App\Http\Livewire;

use App\Models\Egreso;
use App\Models\Ingreso;
use App\Services\ClienteService;
use App\Services\CurrencyService;
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
        $currencyService = new CurrencyService();

        $planes = (new PlanService)->groupByServicio();
        $clientes = (new ClienteService)->groupBySexo();

        $ingresos = (new IngresoService)->getThisMonth();
        $egresos_total = (new EgresoService)->getThisMonth();

        //Build array
        $generalInfo = ([
            'clientes_count' => $clientes->sum('total'),
            'planes_count' => $planes->sum('total'),
            'ingresos_total' => $currencyService->format($ingresos->sum('monto')),
            'egresos_total' => $currencyService->format($egresos_total),
            'becas_total' => $currencyService->format($ingresos->sum('beca')),
            'becas_count' => $ingresos->where('beca', '>', '0')->count(),
            'ganancia_total' => $currencyService->format($ingresos->sum('monto') - $egresos_total),
        ]);

        return view('livewire.home', compact('generalInfo', 'planes', 'clientes'));
    }
}
