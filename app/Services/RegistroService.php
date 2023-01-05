<?php

namespace App\Services;

use App\Models\Registro;

class RegistroService
{
    public function getCurrent()
    {
        $registro = Registro::fromToday();

        if (!$registro) {
            $amount_expired = (new PlanService)->deleteExpired();
            $registro = $this->createToday($amount_expired);
        }

        return $registro;
    }

    public function createToday($status)
    {
        return Registro::create([
            'created_at' => date('Y-m-d'),
            'status' => $status,
        ]);
    }
}
