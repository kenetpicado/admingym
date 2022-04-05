<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Http\Requests\StoreEntrenadorRequest;
use App\Http\Requests\UpdateEntrenadorRequest;
use App\Models\Evento;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrenadors = Entrenador::all();
        return view('entrenador.index', compact('entrenadors', $entrenadors));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntrenadorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntrenadorRequest $request)
    {
        //GUARDAR DATOS PROVENIENTES DEL FORM 
        Entrenador::create($request->all());
        return redirect()->route('entrenador.index')->with('status', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function show(Entrenador $entrenador)
    {
        //
        return view('entrenador.show', compact('entrenador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrenador $entrenador)
    {
        //
        return view('entrenador.edit', compact('entrenador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntrenadorRequest  $request
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntrenadorRequest $request, Entrenador $entrenador)
    {
        //
        $entrenador->update($request->all());
        return redirect()->route('entrenador.index')->with('status', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrenador $entrenador)
    {
        //
        $entrenador->delete();
        return redirect()->route('entrenador.index')->with('status', 'eliminado');
    }
}
