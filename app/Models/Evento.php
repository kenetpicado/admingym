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
        'entrenador_id',
    ];
    
    public $timestamps = false;

    public function entrenador(){
        return $this->belongsTo('App\Models\Entrenador');
    }
}
