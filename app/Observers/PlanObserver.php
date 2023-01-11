<?php

namespace App\Observers;

use App\Models\Ingreso;
use App\Models\Plan;
use App\Models\Reporte;

class PlanObserver
{
    public function created(Plan $plan)
    {
        $plan->load('cliente:id,nombre');

        Reporte::where('cliente_id', $plan->cliente_id)->delete();

        Ingreso::create([
            'concepto' => substr($plan->cliente->nombre . ', ' . $plan->servicio . ', ' . $plan->plan, 0, 50),
            'descripcion' => "CLIENTE: " . $plan->cliente_id,
            'monto' => $plan->monto,
            'beca' => $plan->beca,
            'created_at' => now()->format('Y-m-d')
        ]);
    }
}
