<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaRequest;
use App\Http\Requests\StoreIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Models\Ingreso;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ver = ([
            'total' => Ingreso::all('monto')->sum('monto'),
            'activo' => Ingreso::where('created_at', '>=', date('Y-m-' . '01'))->get('monto')->sum('monto'),
        ]);

        return view('ingreso.index', compact('ver'));
    }

    public function consulta(ConsultaRequest $request)
    {
        $ingresos = Ingreso::where('created_at', '>=', $request->inicio)
            ->where('created_at', '<=', $request->fin)->get();

        $mensaje = 'De ' . $request->inicio . ' a ' . 
        $request->fin . ' se han encontrado ' . 
        $ingresos->count() . ' registros, con un total de C$ ' .
        $ingresos->sum('monto') . ' y C$ ' . $ingresos->sum('beca') . ' en becas';

        return redirect()->route('ingreso.index')
            ->with('ingresos', $ingresos)->with('mensaje', $mensaje);
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
     * @param  \App\Http\Requests\StoreIngresoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngresoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngresoRequest  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngresoRequest $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        //
    }
}
