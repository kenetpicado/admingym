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
}