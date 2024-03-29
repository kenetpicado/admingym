<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Facades\DB;

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

    public function groupByServicio()
    {
        return DB::table('planes')
            ->groupBy('servicio')
            ->orderBy('total', 'desc')
            ->get(['servicio', DB::raw('count(*) as total')]);
    }

    public function getLastDays()
    {
        return DB::table('planes')
            ->where('created_at', '>=', date('Y-m-' . '01'))
            ->where('created_at', '<=', date('Y-m-t'))
            ->groupBy('created_at')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get(DB::raw("CONCAT(DAYNAME(created_at), ' ', DAY(created_at)) as day, count(*) as total"));
    }
}
