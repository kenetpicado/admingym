<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'monto', 'created_at'];
    public $timestamps = false;

    public function setTipoAttribute($value)
    {
        $this->attributes['tipo'] = trim(strtoupper($value));
    }
}
