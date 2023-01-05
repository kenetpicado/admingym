<?php

namespace App\Services;

use App\Models\Reporte;

class ReporteService
{
    public function buildAndSave($expired)
    {
        $reportes = [];

        foreach ($expired as $key => $plan) {
            $reportes[$key] = [
                'mensaje' => $plan->plan,
                'cliente_id' => $plan->cliente_id,
                'created_at' => date('Y-m-d'),
            ];
        }
        
        Reporte::insert($reportes);
    }
}
