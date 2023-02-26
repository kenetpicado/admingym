<?php

namespace App\Services;

use Carbon\Carbon;

class DateService
{
    public static function monthName($month_number)
    {
        $meses = [
            "ENERO",
            "FEBRERO",
            "MARZO",
            "ABRIL",
            "MAYO",
            "JUNIO",
            "JULIO",
            "AGOSTO",
            "SEPTIEMBRE",
            "OCTUBRE",
            "NOVIEMBRE",
            "DICIEMBRE"
        ];

        return $meses[$month_number - 1];
    }

    public function getEndDate($period, $original_start_date)
    {
        $start_date = Carbon::create($original_start_date);
        $end_date = null;

        switch ($period) {
            case 'MENSUAL':
                $end_date = $start_date->addMonth(1)->format('Y-m-d');
                break;
            case 'QUINCENAL':
                $end_date = $start_date->addDays(15)->format('Y-m-d');
                break;
            case 'SEMANAL':
                $end_date = $start_date->addDays(7)->format('Y-m-d');
                break;
            case 'DIA':
                $end_date = $start_date->addDay()->format('Y-m-d');
                break;
        }
        return $end_date;
    }
}
