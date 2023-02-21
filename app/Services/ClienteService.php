<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ClienteService
{
    public function groupBySexo()
    {
        return DB::table('clientes')
            ->groupBy('sexo')
            ->orderBy('total', 'desc')
            ->get(['sexo', DB::raw('count(*) as total')]);
    }
}
