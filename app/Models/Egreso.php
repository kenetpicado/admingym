<?php

namespace App\Models;

use App\Casts\Ucwords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Ucfirst;

class Egreso extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'nota', 'monto', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'tipo' => Ucwords::class,
        'nota' => Ucfirst::class,
    ];
}
