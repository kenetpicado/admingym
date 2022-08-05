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

    public function servicios()
    {
        $servicios = [];
        array_push($servicios, new Items('PESAS'));
        array_push($servicios, new Items('ZUMBA'));
        array_push($servicios, new Items('SPINNING'));
        array_push($servicios, new Items('ZUMBA+PESAS'));
        return $servicios;
    }

    public function planes()
    {
        $servicios = [];
        array_push($servicios, new Items('MENSUAL'));
        array_push($servicios, new Items('QUINCENAL'));
        array_push($servicios, new Items('SEMANAL'));
        array_push($servicios, new Items('DIA'));
        return $servicios;
    }

    public function get_end($value, $fecha)
    {
        $date =  Carbon::create($fecha);

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
