<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'telefono', 'horario'];
    
    public $timestamps = false;

    public function setNombreAttribute($value)
    {
        return $this->attributes['nombre'] = ucwords(trim(strtolower($value)));
    }
}
