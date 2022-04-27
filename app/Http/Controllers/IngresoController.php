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
            'total' => Ingreso::all('monto')->sum('monto'),
            'activo' => Ingreso::where('created_at', '>=', date('Y-m-' . '01'))->get('monto')->sum('monto'),
            'entrenadores' => Evento::all()->sum('monto'),
        ]);

        return view('ingreso.index', compact('ver'));
    }

    public function consulta(Request $request)
    {
        $request->validate([
            'inicio' => 'required|date',
            'fin' => 'required|date|after_or_equal:inicio'
        ], [], [
            'fin' => 'fecha fin',
            'inicio' => 'fecha inicio',
        ]);

        $inicio = $request->inicio;
        $fin = $request->fin;

        $i2 = date('Y-m-d', strtotime($inicio . ' - 1 days'));
        $f2 = date('Y-m-d', strtotime($fin . ' + 1 days'));


        $ingresos = Ingreso::where('created_at', '>=', $i2)
            ->where('created_at', '<=', $f2)->get();

        $mensaje = 'De ' . 
        date('d-m-Y', strtotime($inicio)) . ' a ' . 
        date('d-m-Y', strtotime($fin)) . ' se han encontrado ' . 
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
