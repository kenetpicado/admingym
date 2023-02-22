<?php

namespace App\Services;

use App\Models\Registro;
use Illuminate\Support\Facades\DB;

class RegistroService
{
    public function plansExpiredCount()
    {
        return DB::table('registros')
            ->where('created_at', date('Y-m-d'))
            ->latest('id')
            ->value('status');
    }
}
