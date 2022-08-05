<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Http\Requests\StoreEntrenadorRequest;
use App\Models\Evento;

class EntrenadorController extends Controller
{
    //Ver entrenadores
    public function index()
    {
        $entrenadors = Entrenador::all();
        return view('entrenador.index', compact('entrenadors'));
    }

    //Agregar un nuevo entrenador
    public function create()
    {
        return view('entrenador.create');
    }

    //Guardar un entrenador
    public function store(StoreEntrenadorRequest $request)
    {
        Entrenador::create($request->all());
        return redirect()->route('entrenador.index')->with('info', config('app.add'));
    }

    //Ver eventos de un entrenador
    public function show($entrenador_id)
    {
        $eventos = Evento::where('entrenador_id', $entrenador_id)->get();
        return view('entrenador.show', compact('eventos', 'entrenador_id'));
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
