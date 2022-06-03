<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\StoreIngresoRequest;
use App\Models\Ingreso;
use App\Models\Info;

class IngresoController extends Controller
{
    public function index()
    {
        $ver = ([
            'total' => Info::getTotal(new Ingreso()),
            'activo' => Info::getMonthly(new Ingreso()),
            'mes' => HomeController::current_month(),
        ]);

        return view('ingreso.index', compact('ver'));
    }

    public function create()
    {
        return view('ingreso.create');
    }

    public function consulta(ConsultaRequest $request)
    {
        $ingresos = Info::getRange(new Ingreso(), $request->inicio, $request->fin);

        $mensaje = $ingresos->sum('monto');

        return redirect()->route('ingreso.index')
            ->with('ingresos', $ingresos)->with('mensaje', $mensaje);
    }

    public function store(StoreIngresoRequest $request)
    {
        $request->merge([
            'nombre' => '-'
        ]);

        Ingreso::create($request->all());
        return redirect()->route('ingreso.index')->with('status', 'ok');
    }
}
