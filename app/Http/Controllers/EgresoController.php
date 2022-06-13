<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEgresoRequest;
use App\Models\Egreso;
use App\Models\Info;
use App\Http\Requests\ConsultaRequest;

class EgresoController extends Controller
{
    public function index()
    {
        $ver = ([
            'total' => Info::getTotal(new Egreso()),
            'activo' => Info::getMonthly(new Egreso()),
            'mes' => HomeController::current_month(),
        ]);

        return view('egreso.index', compact('ver'));
    }

    //Ver todos los egresos
    public function all()
    {
        $egresos = Egreso::latest()->get();
        return view('egreso.all', compact('egresos'));
    }

    //Ver un tipo de egreso
    public function ver($value)
    {
        $value = strtoupper($value);
        $egresos = Egreso::where('tipo', $value)->get();
        return view('egreso.ver', compact('egresos', 'value'));
    }

    public function create()
    {
        return view('egreso.create');
    }

    //Consulta personalizada
    public function consulta(ConsultaRequest $request)
    {
        $egresos = Info::getRange(new Egreso(), $request->inicio, $request->fin);

        $mensaje = $egresos->sum('monto');

        return redirect()->route('egresos.index')
            ->with('egresos', $egresos)->with('mensaje', $mensaje);
    }

    public function store(StoreEgresoRequest $request)
    {
        Egreso::create($request->all());

        if ($request->has('category'))
            return redirect()->route('egreso.ver', strtolower($request->tipo))->with('info', config('app.add'));
        else
            return redirect()->route('egresos.index')->with('info', config('app.add'));
    }

    public function edit(Egreso $egreso)
    {
        return view('egreso.edit', compact('egreso'));
    }

    public function update(StoreEgresoRequest $request, Egreso $egreso)
    {
        $egreso->update($request->all());
        return redirect()->route('egreso.all')->with('info', config('app.update'));
    }
}
