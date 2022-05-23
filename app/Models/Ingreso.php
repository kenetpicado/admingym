<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto',
        'nombre',
        'beca',
        'servicio',
    ];

    public function setServicioAttribute($value)
    {
        $this->attributes['servicio'] = trim(strtoupper($value));
    }
    
    public $timestamps = false;
}
