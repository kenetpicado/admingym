<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['monto'];

    public static function getMonto($servicio, $plan)
    {
        return Precio::where('servicio', $servicio)
            ->where('plan', $plan)
            ->value('monto');
    }
}
