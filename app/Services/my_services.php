<?php

namespace App\Services;

use App\Classes\Items;
use Carbon\Carbon;

class my_services
{
    public static function current_month()
    {
        $meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
        return $meses[date('n') - 1];
    }

    public function get_end($value, $fecha)
    {
        $date =  Carbon::create($fecha);
        $new = null;

        switch ($value) {
            case 'MENSUAL':
                $new = $date->addMonth(1)->format('Y-m-d');
                break;
            case 'QUINCENAL':
                $new = $date->addDays(15)->format('Y-m-d');
                break;
            case 'SEMANAL':
                $new = $date->addDays(7)->format('Y-m-d');
                break;
            case 'DIA':
                $new = $date->addDay()->format('Y-m-d');
                break;
        }
        return $new;
    }
}
