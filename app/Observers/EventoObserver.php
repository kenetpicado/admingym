<?php

namespace App\Observers;

use App\Models\Egreso;
use App\Models\Evento;

class EventoObserver
{
    public function created(Evento $evento)
    {
        if ($evento->tipo == 'PAGO') {
            Egreso::create([
                'concepto' => 'Salario',
                'descripcion' => "Entrenador: " . substr(str_repeat(0, 4) . $evento->entrenador_id, -4),
                'monto' => $evento->monto,
                'created_at' => now()->format('Y-m-d')
            ]);
        }
    }
}
