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

    public function entrenador(){
        return $this->belongsTo('App\Models\Entrenador');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d F Y', strtotime($value));
    }
}
