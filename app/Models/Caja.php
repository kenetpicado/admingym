<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Caja extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    //RELACION UNO A MUCHOS INVERSA
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
