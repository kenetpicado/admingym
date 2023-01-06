<?php

namespace App\Http\Livewire;

use App\Models\Egreso;
use App\Models\Ingreso;
use App\Services\DateService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Services\PercentageService;

class Home extends Component
{
    public function render()
    {
        $percentageService = new PercentageService();

        //Obtener datos
        $clientes = DB::table('clientes')->get(['id', 'sexo']);
        $planes = DB::table('planes')->get('servicio');

        $ingresos = Ingreso::getMensual();
        $egresos = Egreso::getMensual();

        //Porcentaje de sexo
        $sexo = ([
            'M' => $percentageService->getWithCondition($clientes, 'sexo', 'M'),
            'F' => $percentageService->getWithCondition($clientes, 'sexo', 'F')
        ]);

        //Porcentaje de servicios
        $servicios = ([
            'PESAS' => $percentageService->getWithCondition($planes, 'servicio', 'PESAS'),
            'ZUMBA' => $percentageService->getWithCondition($planes, 'servicio', 'ZUMBA'),
            'ZUMBA+PESAS' => $percentageService->getWithCondition($planes, 'servicio', 'ZUMBA+PESAS'),
        ]);

        //Datos generales
        $ver = ([
            'clientes'      => $clientes->count(),
            'planes'        => $planes->count(),
            'ingresos'      => $ingresos->sum('monto'),
            'egresos'       => $egresos->sum('monto'),
            'sum_becas'     => $ingresos->sum('beca'),
            'count_becas'   => $ingresos->where('beca', '>', '0')->count(),
            'mes'           => (new DateService)->current_month(),
            'activos'       => $percentageService->get($clientes->count(), $planes->count()),
        ]);

        return view('livewire.home', compact('sexo', 'servicios', 'ver'));
    }
}
