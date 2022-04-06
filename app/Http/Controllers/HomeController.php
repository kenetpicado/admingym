<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cliente;
use App\Models\Entrenador;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

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

        $m = $f = $activos = $porcentaje = 0;
        $pesas = $spinning = $zumba = $taek = 0;


        if($clientes->count() > 0) 
        {
            //CANTIDAD DE HOMBRES Y MUJERES
            $m = round($clientes->where('sexo', '=', 'M')->count() * 100 / $clientes->count(), 1);

            $f = round($clientes->where('sexo', '=', 'F')->count() * 100 / $clientes->count(), 1);
        }
        if($cajas->count() > 0)
        {
            $pesas = round($cajas->where('servicio', '=', 'PESAS')->count()*100/$cajas->count(), 1);
            $spinning = round($cajas->where('servicio', '=', 'SPINNING')->count()*100/$cajas->count(), 1);
            $zumba = round($cajas->where('servicio', '=', 'ZUMBA')->count()*100/$cajas->count(), 1);
            $taek = round($cajas->where('servicio', '=', 'TAEKWONDO')->count()*100/$cajas->count(), 1);
        
            // $activos = round($cajas->count() * 100 / $clientes->count(), 1);
            $activos = round(Cliente::has('cajas')->get()->count() * 100 / $clientes->count(), 1);
            $porcentaje = round($cajas->where('beca', '>', '0')->count() * 100 / $cajas->count(), 1);
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
            'activos'=> $activos,
            'ingresos' => $cajas->sum('monto'),
            'becas' => $cajas->where('beca', '>', '0')->count(),
            'porcentaje' => $porcentaje
        ]);

        return view('index', compact('sexo', 'servicios', 'ver'));
        
    }
}
