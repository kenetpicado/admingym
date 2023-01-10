<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class IngresoService
{
    public function getThisMonth()
    {
        return DB::table('ingresos')
            ->where('created_at', '>=', date('Y-m-' . '01'))
            ->get(['monto', 'beca']);
    }

    public function getForStats($year = 2022)
    {
        return DB::table('ingresos')
            ->select(DB::raw("MONTH(created_at) as mes, sum(monto) as total"))
            ->whereYear('created_at', $year)
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('mes')
            ->get();
    }
}
