<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Models\Ingreso;
use App\Models\Caja;
use App\Models\Evento;
use Illuminate\Http\Request;

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
            'total' => Ingreso::all()->sum('monto'),
            'activo' => Caja::all()->sum('monto'),
            'entrenadores' => Evento::all()->sum('monto'),
        ]);

        return view('ingreso.index', compact('ver'));
    }
    public function consulta(Request $request)
    {
        $request->validate([
            'inicio' => 'required|date',
            'fin' => 'required|date|after_or_equal:inicio|before_or_equal:tomorrow'
        ],[],[
            'fin' => 'fecha fin',
            'inicio' => 'fecha inicio',
        ]);

        $inicio = $request->input('inicio');
        $fin = $request->input('fin');


        $monto = Ingreso::where('created_at', '>=', $inicio)
        ->where('created_at', '<=', $fin)->get()->sum('monto');

        return redirect()->route('ingreso.index')
        ->with('monto', 'Se han registrado C$ ' . $monto);
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
