<?php

namespace App\Http\Livewire;

use App\Events\ApplicationStarted;
use App\Services\ClienteService;
use App\Services\CurrencyService;
use App\Services\EgresoService;
use App\Services\IngresoService;
use App\Services\PlanService;
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

    public function mount()
    {
        ApplicationStarted::dispatch();

        if (auth()->user()->hasRole('consultor')) {
            return redirect()->route('planes');
        }
    }
}
