<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Egreso;
use App\Services\my_services;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //Obtener datos
        $clientes = DB::table('clientes')->get(['id', 'sexo']);
        $planes = DB::table('planes')->get('servicio');

        $ingresos = Ingreso::getMensual();
        $egresos = Egreso::getMensual();

        //Porcentaje de sexo
        $sexo = ([
            'M' => $this->porcentaje($clientes, 'sexo', 'M'),
            'F' => $this->porcentaje($clientes, 'sexo', 'F'),
        ]);

        //Porcentaje de servicios
        $servicios = ([
            'PESAS' => $this->porcentaje($planes, 'servicio', 'PESAS'),
            'ZUMBA' => $this->porcentaje($planes, 'servicio', 'ZUMBA'),
            'ZUMBA+PESAS' => $this->porcentaje($planes, 'servicio', 'ZUMBA+PESAS'),
        ]);

        //Datos generales
        $ver = ([
            'clientes' => $clientes->count(),
            'planes' => $planes->count(),
            'ingresos' => $ingresos->sum('monto'),
            'egresos' => $egresos->sum('monto'),
            'sum_becas' => $ingresos->sum('beca'),
            'count_becas' => $ingresos->where('beca', '>', '0')->count(),
            'mes' => (new my_services)->current_month(),
            'activos' => $this->getActivos($clientes->count(), $planes->count()),
        ]);

        return view('index', compact('sexo', 'servicios', 'ver'));
    }

    //Porcentaje de personas activas
    public function getActivos($clientes, $planes)
    {
        if ($clientes == 0 || $planes == 0)
            return '0';

        return round(($planes * 100) / $clientes, 1);
    }

    //Obtener porcentaje
    public function porcentaje($modelo, $columna, $valor)
    {
        return $modelo->count() > 0
            ? round($modelo->where($columna, $valor)->count() * 100 / $modelo->count(), 1)
            : '0';
    }
}
