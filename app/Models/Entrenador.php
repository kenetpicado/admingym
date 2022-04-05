<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;
    protected $guarded = [];

    //FUNCION PARA CONVERTIR EL NOMBRE EN MAYUSCULA
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = trim(strtoupper($value));
    }
    //FUNCION PARA CONVERTIR EL NOMBRE EN MAYUSCULA
    public function setHorarioAttribute($value)
    {
        $this->attributes['horario'] = trim(strtoupper($value));
    }
    public function eventos()
    {
        return $this->hasMany('App\Models\Evento');
    }
}
