<?php

namespace App\Services;

use App\Models\Plan;

class PlanService
{
    public function buildInstance(&$plan)
    {
        $plan = new Plan();
        $plan->servicio = "PESAS";
        $plan->plan = "MENSUAL";
        $plan->beca = 0;
        $plan->created_at = date('Y-m-d');
    }

    public function deleteExpired(): int
    {
        $expired = Plan::expired()->get();

        if (!$expired->isEmpty()) {

            (new ReporteService)->buildAndSave($expired);

            Plan::deleteIds($expired->pluck('id'));
        }

        return $expired->count();
    }
}
