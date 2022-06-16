<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\StoreIngresoRequest;
use App\Models\Ingreso;
use App\Models\Info;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        $ingresos = DB::table('ingresos')->latest('id')->get();

        $ver = ([
            'total' => $ingresos->sum('monto'),
            'activo' => $ingresos->where('created_at', '>=', date('Y-m-' . '01'))->sum('monto'),
            'mes' => HomeController::current_month(),
        ]);

        return view('ingreso.index', compact('ver', 'ingresos'));
    }

    public function consulta(ConsultaRequest $request)
    {
        $ingresos = Info::getRange(new Ingreso(), $request->inicio, $request->fin);

        $mensaje = $ingresos->sum('monto');

        return redirect()->route('ingresos.index')
            ->with('ingresos', $ingresos)->with('mensaje', $mensaje);
    }

    public function store(StoreIngresoRequest $request)
    {
        Ingreso::create($request->all());
        return redirect()->route('ingresos.index')->with('info', config('app.add'));
    }
}
