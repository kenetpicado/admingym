<?php

namespace App\Services;

use App\Models\Cliente;
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

    public function refresh()
    {
        $clientes = Cliente::has('planes')->pluck('id');
        Reporte::whereIn('cliente_id', $clientes)->delete();
    }
}
