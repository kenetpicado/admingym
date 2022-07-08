<?php

namespace App\Models;

use App\Casts\Ucfirst;
use App\Casts\Ucwords;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingreso extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'monto',
        'nombre',
        'beca',
        'servicio',
        'created_at'
    ];

    protected $casts = [
        'nombre' => Ucwords::class,
        'servicio' => Ucfirst::class,
    ];

    public static function getMensual()
    {
        return DB::table('ingresos')
            ->where('created_at', '>=', date('Y-m-' . '01'))
            ->get();
    }

    public static function getBetween($request)
    {
        return DB::table('ingresos')
            ->whereBetween('created_at', [$request->inicio, $request->fin])
            ->oldest('created_at')
            ->get();
    }

    public static function getCategoria($request)
    {
        return DB::table('ingresos')
            ->where('nombre', 'like', '%' . $request->categoria . '%')
            ->get();
    }
}
