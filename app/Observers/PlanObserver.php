<?php

namespace App\Observers;

use App\Models\Ingreso;
use App\Models\Plan;
use App\Models\Reporte;
use App\Services\IngresoService;

class PlanObserver
{
    public function created(Plan $plan)
    {
        $plan->load('cliente:id,nombre');

        Reporte::where('cliente_id', $plan->cliente_id)->delete();

        Ingreso::create([
            'concepto' => (new IngresoService)->buildConcepto($plan),
            'descripcion' => (new IngresoService)->buildDescripcion($plan),
            'monto' => $plan->monto,
            'beca' => $plan->beca,
            'created_at' => now()->format('Y-m-d'),
            'plan_id' => $plan->id
        ]);
    }

    public function updated(Plan $plan)
    {
        $plan->load('cliente:id,nombre');

        $ingreso = Ingreso::where('plan_id', $plan->id)->first();

        if ($ingreso) {
            $ingreso->update([
                'concepto' => (new IngresoService)->buildConcepto($plan),
                'descripcion' => (new IngresoService)->buildDescripcion($plan),
                'monto' => $plan->monto,
                'beca' => $plan->beca,
            ]);
        }
    }
}
