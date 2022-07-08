<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Http\Requests\StoreEntrenadorRequest;

class EntrenadorController extends Controller
{
    //Ver entrenadores
    public function index()
    {
        $entrenadors = Entrenador::all();
        return view('entrenador.index', compact('entrenadors'));
    }

    //Guardar un entrenador
    public function store(StoreEntrenadorRequest $request)
    {
        Entrenador::create($request->all());
        return redirect()->route('entrenador.index')->with('info', config('app.add'));
    }

    //Ver eventos de un entrenador
    public function show(Entrenador $entrenador)
    {
        $entrenador->load('eventos');
        return view('entrenador.show', compact('entrenador'));
    }

    //Editar un entrenador
    public function edit(Entrenador $entrenador)
    {
        return view('entrenador.edit', compact('entrenador'));
    }

    //Actualizar entrenador
    public function update(StoreEntrenadorRequest $request, Entrenador $entrenador)
    {
        $entrenador->update($request->all());
        return redirect()->route('entrenador.index')->with('info', config('app.update'));
    }
}
