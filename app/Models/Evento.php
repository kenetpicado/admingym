<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Ucfirst;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'monto',
        'nota',
        'entrenador_id',
        'created_at',
    ];
    
    public $timestamps = false;

    protected $casts = [
        'nota' => Ucfirst::class,
    ];

    public function scopeEntrenador($query, $entrenador_id)
    {
        return $query->where('entrenador_id', $entrenador_id);
    }

    public function getFormatCreatedAtAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }
}
