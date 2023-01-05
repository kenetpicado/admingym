<?php

namespace App\Services;

use App\Models\Plan;

class PlanService
{
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
