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
                'descripcion' => "Personal: " . $evento->entrenador_id,
                'monto' => $evento->monto,
                'created_at' => now()->format('Y-m-d')
            ]);
        }
    }
}
