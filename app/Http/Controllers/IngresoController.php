<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\StoreIngresoRequest;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    //Ver ingresos
    public function index()
    {
        $ingresos = DB::table('ingresos')
            ->latest('id')
            ->paginate(20);

        return view('ingreso.index', compact('ingresos'));
    }
    
    //Guardar ingreso
    public function store(StoreIngresoRequest $request)
    {
        Ingreso::create($request->all());
        return redirect()->route('ingresos.index')->with('info', config('app.add'));
    }

    //Editar ingreso
    public function edit(Ingreso $ingreso)
    {
        return view('ingreso.edit', compact('ingreso'));
    }

    //Actualizar ingreso
    public function update(StoreIngresoRequest $request, Ingreso $ingreso)
    {
        $ingreso->update($request->all());
        return redirect()->route('ingresos.index')->with('info', config('app.update'));
    }

    //Obtener ingresos de un rango de fechas
    public function get_rango(ConsultaRequest $request)
    {
        $ingresos = Ingreso::getBetween($request);
        $total = $ingresos->sum('monto');

        return redirect()->route('ingresos.rango')
            ->with('ingresos', $ingresos)
            ->with('total', $total);
    }

    //Ver ingresos segun caterogia
    public function get_categorias(Request $request)
    {
        $ingresos = Ingreso::getCategoria($request);
        $total = $ingresos->sum('monto');

        return redirect()->route('ingresos.categorias')
            ->with('ingresos', $ingresos)
            ->with('total', $total);
    }
}
