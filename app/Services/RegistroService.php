<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RegistroService
{
    public function todayStatus()
    {
        return DB::table('registros')
            ->where('created_at', date('Y-m-d'))
            ->latest('id')
            ->value('status');
    }
}
