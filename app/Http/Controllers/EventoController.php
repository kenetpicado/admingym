<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;

class EventoController extends Controller
{
    //Guardar evento
    public function store(StoreEventoRequest $request)
    {
        if ($request->tipo == 'PAGO') {
            Egreso::create([
                'tipo' => 'Salario',
                'nota' => $request->name,
                'monto' => $request->monto,
                'created_at' => $request->created_at,
            ]);
        }

        Evento::create($request->all());
        return redirect()->route('entrenador.show', $request->entrenador_id)->with('info', config('app.add'));
    }
}
