<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Http\Requests\StoreEntrenadorRequest;
use App\Http\Requests\UpdateEntrenadorRequest;

class EntrenadorController extends Controller
{
    public function index()
    {
        $entrenadors = Entrenador::all(['id', 'nombre', 'telefono', 'horario']);
        return view('entrenador.index', compact('entrenadors'));
    }

    public function store(StoreEntrenadorRequest $request)
    {
        Entrenador::create($request->all());
        return redirect()->route('entrenador.index')->with('status', 'ok');
    }

    public function show($entrenador_id)
    {
        $entrenador = Entrenador::with('eventos')->find($entrenador_id, ['id', 'nombre']);
        return view('entrenador.show', compact('entrenador'));
    }

    public function edit(Entrenador $entrenador)
    {
        return view('entrenador.edit', compact('entrenador'));
    }

    public function update(UpdateEntrenadorRequest $request, Entrenador $entrenador)
    {
        $entrenador->update($request->all());
        return redirect()->route('entrenador.index')->with('status', 'ok');
    }

    public function destroy(Entrenador $entrenador)
    {
        //
    }
}
