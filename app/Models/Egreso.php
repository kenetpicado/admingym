<?php

namespace App\Models;

use App\Casts\Ucfirst;
use App\Casts\Ucwords;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Egreso extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'nota', 'monto', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'tipo' => Ucwords::class,
        'nota' => Ucfirst::class,
    ];

    public static function getMensual()
    {
        return DB::table('egresos')->where('created_at', '>=', date('Y-m-' . '01'))->get();
    }
}
