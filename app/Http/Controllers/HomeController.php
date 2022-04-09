<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cliente;
use App\Models\Entrenador;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use App\Models\Reporte;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //OBTENER DATOS
        $clientes = Cliente::all();
        $cajas = Caja::all();
        $m = $f = $activos = $porcentaje = $personas = 0;
        $pesas = $spinning = $zumba = $taek = 0;
 
        if ($clientes->count() > 0) {
            $m = HomeController::get_percent($clientes, 'sexo', 'M');
            $f = HomeController::get_percent($clientes, 'sexo', 'F');
        }

        if ($cajas->count() > 0) {
            $pesas = HomeController::get_percent($cajas, 'servicio', 'PESAS');
            $spinning = HomeController::get_percent($cajas, 'servicio', 'SPINNING');
            $zumba = HomeController::get_percent($cajas, 'servicio', 'ZUMBA');
            $taek = HomeController::get_percent($cajas, 'servicio', 'TAEKWONDO');
;
            $activos = round(Cliente::has('cajas')->get()->count() * 100 / $clientes->count(), 1);
            $porcentaje = HomeController::percent_becas();
            $personas = HomeController::personas();
        }
        $sexo = ([
            'M' => $m,
            'F' => $f
        ]);
        $servicios = ([
            'PESAS' => $pesas,
            'SPINNING' => $spinning,
            'ZUMBA' => $zumba,
            'TAEKWONDO' => $taek,
        ]);

        $ver = ([
            'clientes' => $clientes->count(),
            'entrenadores' => Entrenador::all()->count(),
            'cajas' => $cajas->count(),
            'activos' => $activos,
            'ingresos' => HomeController::suma_mensual('monto'),
            'becas' => HomeController::suma_mensual('beca'),
            'porcentaje' => $porcentaje,
            'personas' => $personas
        ]);

        $reportes = Reporte::all();
        return view('index', compact('sexo', 'servicios', 'ver', 'reportes'));
    }

    //PERSONAS QUE TIENEN BECA
    public function personas()
    {
        return Ingreso::where('created_at', '>=', date('Y-m-' . '01'))->where('beca', '>', '0')->get()->count();
    }

    //SUMA MENSUAL DE UN CAMPO
    public function suma_mensual($field)
    {
        return Ingreso::where('created_at', '>=', date('Y-m-' . '01'))->get()->sum($field);
    }

    public function percent_becas()
    {
        $monto = HomeController::suma_mensual('monto');
        $beca = HomeController::suma_mensual('beca');

        $total = $monto + $beca;
        return round($beca * 100 / $total, 1);
    }

    //FUNCION PARA OBTENER EL PORCENTAJE
    public function get_percent($objeto, $columna, $valor)
    {
        return round($objeto->where($columna, '=', $valor)->count() * 100 / $objeto->count(), 1);
    }
}
