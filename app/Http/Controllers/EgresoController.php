<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEgresoRequest;
use App\Http\Requests\UpdateEgresoRequest;
use App\Models\Egreso;
use App\Http\Requests\ConsultaRequest;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $total = Egreso::all('monto')->sum('monto');
        $mes = Egreso::where('created_at', '>=', date('Y-m-' . '01'))->get('monto')->sum('monto');

        $ver = ([
            'total' =>  $total,
            'mes' =>  $mes,
        ]);

        return view('egreso.index', compact('ver'));
    }

    public function ver($value)
    {
        //
        $egresos = Egreso::where('tipo', $value)->get(['created_at', 'monto']);
        return view('egreso.ver', compact('egresos', 'value'));
    }

    public function consulta(ConsultaRequest $request)
    {
        $inicio = date('Y-m-d', strtotime($request->inicio . ' - 1 days'));
        $fin = date('Y-m-d', strtotime($request->fin . ' + 1 days'));

        $egresos = Egreso::where('created_at', '>=', $inicio)
            ->where('created_at', '<=', $fin)->get();

        $mensaje = 'De ' . 
        date('d-m-Y', strtotime($request->inicio)) . ' a ' . 
        date('d-m-Y', strtotime($request->fin)) . ' se han encontrado ' . 
        $egresos->count() . ' registros, con un total de C$ ' .
        $egresos->sum('monto');

        return redirect()->route('egresos.index')
            ->with('egresos', $egresos)->with('mensaje', $mensaje);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEgresoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEgresoRequest $request)
    {
        //
        Egreso::create($request->all());
        return redirect()->route('egreso.ver', $request->tipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function show(Egreso $egreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Egreso $egreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEgresoRequest  $request
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEgresoRequest $request, Egreso $egreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egreso $egreso)
    {
        //
    }
}
