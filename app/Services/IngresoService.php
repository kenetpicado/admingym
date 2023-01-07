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
}