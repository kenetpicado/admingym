<?php

namespace App\Models;

use App\Casts\Ucfirst;
use App\Casts\Upper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingreso extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'concepto',
        'descripcion',
        'monto',
        'beca',
        'created_at'
    ];

    protected $casts = [
        'concepto' => Upper::class,
        'descripcion' => Ucfirst::class,
    ];

    public static function getMensual()
    {
        return Ingreso::where('created_at', '>=', date('Y-m-' . '01'))->get();
    }

    public static function getBetween($request)
    {
        return Ingreso::whereBetween('created_at', [$request->inicio, $request->fin])
            ->oldest('created_at')
            ->get();
    }

    public static function getCategoria($request)
    {
        return Ingreso::where('concepto', 'like', '%' . $request->categoria . '%')->get();
    }
}
