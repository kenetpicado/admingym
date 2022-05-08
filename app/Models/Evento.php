<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function entrenador(){
        return $this->belongsTo('App\Models\Entrenador');
    }
}
