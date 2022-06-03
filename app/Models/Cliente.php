<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;
use App\Models\Reporte;
use App\Models\Peso;

class Cliente extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public static function getData($cliente_id)
    {
        return Cliente::find($cliente_id, ['id', 'nombre', 'email']);
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = trim(strtoupper($value));
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = trim(strtolower($value));
    }

    public function getNombreAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function planes()
    {
        return $this->hasMany(Plan::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
    public function pesos()
    {
        return $this->hasMany(Peso::class);
    }
}
