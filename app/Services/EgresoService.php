<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class EgresoService
{
    public function getThisMonth()
    {
        return DB::table('egresos')
            ->where('created_at', '>=', date('Y-m-' . '01'))
            ->sum('monto');
    }

    public function getForStats($year = 2022)
    {
        return DB::table('egresos')
            ->select(DB::raw("MONTH(created_at) as mes, sum(monto) as total"))
            ->whereYear('created_at', $year)
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('mes')
            ->get();
    }
}
