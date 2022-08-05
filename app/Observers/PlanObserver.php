<?php

namespace App\Observers;

use App\Models\Ingreso;
use App\Models\Plan;
use App\Models\Reporte;

class PlanObserver
{
    public function created(Plan $plan)
    {
        Reporte::where('cliente_id', $plan->cliente_id)->delete();

        Ingreso::create([
            'concepto' => $plan->servicio . ' - ' . $plan->plan,
            'descripcion' => "Cliente: " . substr(str_repeat(0, 4) . $plan->cliente_id, -4),
            'monto' => $plan->monto,
            'beca' => $plan->beca,
            'created_at' => now()->format('Y-m-d')
        ]);
    }
}
