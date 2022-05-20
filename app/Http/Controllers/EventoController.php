<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Models\Egreso;
use App\Models\Entrenador;

class EventoController extends Controller
{

    public function store(StoreEventoRequest $request)
    {
        if ($request->tipo == 'PAGO') {
            Egreso::create([
                'tipo' => 'SALARIO-ENTRENADOR',
                'monto' => $request->monto
            ]);
        }

        Evento::create($request->all());
        return redirect()->route('entrenador.show', $request->entrenador_id)->with('status', 'ok');
    }
}
