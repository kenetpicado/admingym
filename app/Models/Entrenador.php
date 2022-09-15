<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Ucfirst;
use App\Casts\Ucwords;

class Entrenador extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'telefono', 'horario'];
    public $timestamps = false;

    protected $casts = [
        'nombre' => Ucwords::class
    ];
}
