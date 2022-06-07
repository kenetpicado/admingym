<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function entrenador(){
        return $this->belongsTo('App\Models\Entrenador');
    }

    public function setNotaAttribute($value)
    {
        $this->attributes['nota'] = trim(strtoupper($value));
    }

    public function getNotaAttribute($value)
    {
        return ucwords(strtolower($value));
    }
}
