<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;

class EventoController extends Controller
{
    //Guardar evento
    public function store(StoreEventoRequest $request)
    {
        Evento::create($request->all());
        
        return redirect()
            ->route('entrenador.show', $request->entrenador_id)
            ->with('info', config('app.add'));
    }
}
