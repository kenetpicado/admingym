<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    
    //RELACION UNO A MUCHOS INVERSA
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }
}
