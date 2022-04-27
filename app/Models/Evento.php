<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function entrenador(){
        return $this->belongsTo('App\Models\Entrenador');
    }

    public function getCreatedAtAttribute($value)
    {
        return date("d-F-Y", strtotime($value));
    }
}
