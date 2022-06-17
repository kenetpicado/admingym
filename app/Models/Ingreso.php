<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'monto',
        'nombre',
        'beca',
        'servicio',
        'created_at'
    ];

    public function getNombreAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getServicioAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function setServicioAttribute($value)
    {
        $this->attributes['servicio'] = trim(ucfirst(strtolower($value)));
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = trim(ucwords(strtolower($value)));
    } 
}
