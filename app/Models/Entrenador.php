<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = trim(strtoupper($value));
    }

    public function setHorarioAttribute($value)
    {
        $this->attributes['horario'] = trim(strtoupper($value));
    }

    public function eventos()
    {
        return $this->hasMany('App\Models\Evento');
    }
}
