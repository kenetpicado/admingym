<?php

namespace App\Models;

use App\Casts\Ucfirst;
use App\Casts\Ucwords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;
use App\Models\Reporte;
use App\Models\Peso;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'email', 'fecha', 'sexo'];
    public $timestamps = false;

    protected $casts = [
        'nombre' => Ucwords::class,
        'email' => Ucfirst::class,
    ];

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
