<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\StoreEgresoRequest;

class EgresoController extends Controller
{
    public function index()
    {
        $egresos = Egreso::latest('id')->get();
        
        $ver = ([
            'total' => $egresos->sum('monto'),
            'activo' => $egresos->where('created_at', '>=', date('Y-m-' . '01'))->sum('monto'),
            'mes' => HomeController::current_month(),
        ]);

        return view('egreso.index', compact('ver', 'egresos'));
    }

    public function store(StoreEgresoRequest $request)
    {
        Egreso::create($request->all());
        return redirect()->route('egresos.index')->with('info', config('app.add'));   
    }

    public function edit(Egreso $egreso)
    {
        return view('egreso.edit', compact('egreso'));
    }

    public function update(StoreEgresoRequest $request, Egreso $egreso)
    {
        $egreso->update($request->all());
        return redirect()->route('egresos.index')->with('info', config('app.update'));
    }

    public function get_rango(ConsultaRequest $request)
    {
        $egresos = Egreso::whereBetween('created_at', [$request->inicio, $request->fin])->get();

        $total = $egresos->sum('monto');

        return redirect()->route('egresos.rango')
            ->with('egresos', $egresos)
            ->with('total', $total);
    }

    public function get_categorias(Request $request)
    {
        $egresos = Egreso::where('tipo', 'like', '%' . $request->categoria . '%')->get();
        $total = $egresos->sum('monto');

        return redirect()->route('egresos.categorias')
            ->with('egresos', $egresos)
            ->with('total', $total);
    }
}
