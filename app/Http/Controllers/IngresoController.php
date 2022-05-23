<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Models\Ingreso;
use App\Models\Info;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        $ver = ([
            'total' => Info::getTotal(new Ingreso()),
            'activo' => Info::getMonthly(new Ingreso()),
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

    public function store(Request $request)
    {
        $request->validate([
            'servicio' => 'required',
            'monto' => 'required|numeric|gt:0'
        ]);

        $request->merge([
            'nombre' => '-'
        ]);

        Ingreso::create($request->all());
        return redirect()->route('ingreso.index');
    }
}
