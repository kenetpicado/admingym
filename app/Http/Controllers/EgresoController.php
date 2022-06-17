<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEgresoRequest;
use App\Models\Egreso;
use App\Http\Requests\ConsultaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function rango()
    {
        return view('ingreso.rango');
    }

    public function categorias()
    {
        return view('egreso.categorias');
    }

    public function get_rango(ConsultaRequest $request)
    {
        $egresos = Egreso::where('created_at', '>=', $request->inicio)
            ->where('created_at', '<=', $request->fin)
            ->get()
            ->sortBy('created_at');

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
}
