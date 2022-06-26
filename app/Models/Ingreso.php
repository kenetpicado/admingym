<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Ucfirst;
use App\Casts\Ucwords;

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

    protected $casts = [
        'nombre' => Ucwords::class,
        'servicio' => Ucfirst::class,
    ];
}
