<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caja;
use App\Models\Reporte;

class Cliente extends Model
{
    //use HasFactory;
    //AL INSERTAR LOS DATOS NO GENERA ERROR EL _TOKEN DE CSRF QUE SE HA ENVIADO
    protected $guarded = [];

    //FUNCION PARA CONVERTIR EL NOMBRE EN MAYUSCULA
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = trim(strtoupper($value));
    }

    public function cajas(){
        return $this->hasMany(Caja::class);
    }

    public function reportes(){
        return $this->hasMany(Reporte::class);
    }
}
