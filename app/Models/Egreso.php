<?php

namespace App\Models;

use App\Casts\Upper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Egreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'concepto',
        'descripcion',
        'monto',
        'created_at'
    ];

    public $timestamps = false;

    protected $casts = [
        'concepto' => Upper::class,
        'descripcion' => Upper::class,
    ];

    public static function getMensual()
    {
        return DB::table('egresos')->where('created_at', '>=', date('Y-m-' . '01'))->get(['monto']);
    }
}
