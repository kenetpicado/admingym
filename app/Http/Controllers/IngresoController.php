<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\StoreIngresoRequest;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        $ingresos = Ingreso::latest('id')->get();
        $ver = ([
            'total' => $ingresos->sum('monto'),
            'activo' => $ingresos->where('created_at', '>=', date('Y-m-' . '01'))->sum('monto'),
            'mes' => HomeController::current_month(),
        ]);

        return view('ingreso.index', compact('ver', 'ingresos'));
    }

    public function rango()
    {
        return view('ingreso.rango');
    }

    public function categorias()
    {
        return view('ingreso.categorias');
    }

    public function get_rango(ConsultaRequest $request)
    {
        $ingresos = Ingreso::where('created_at', '>=', $request->inicio)
            ->where('created_at', '<=', $request->fin)
            ->get()
            ->sortBy('created_at');

        $total = $ingresos->sum('monto');

        return redirect()->route('ingresos.rango')
            ->with('ingresos', $ingresos)
            ->with('total', $total);
    }

    public function get_categorias(Request $request)
    {
        $ingresos = Ingreso::where('nombre', 'like', '%' . $request->categoria . '%')->get();
        $total = $ingresos->sum('monto');

        return redirect()->route('ingresos.categorias')
            ->with('ingresos', $ingresos)
            ->with('total', $total);
    }

    public function store(StoreIngresoRequest $request)
    {
        Ingreso::create($request->all());
        return redirect()->route('ingresos.index')->with('info', config('app.add'));
    }

    public function edit(Ingreso $ingreso)
    {
        return view('ingreso.edit', compact('ingreso'));
    }

    public function update(StoreIngresoRequest $request, Ingreso $ingreso)
    {
        $ingreso->update($request->all());
        return redirect()->route('ingresos.index')->with('info', config('app.update'));
    }
}
