<?php

namespace App\Models;

use App\Casts\Upper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = ['mensaje', 'cliente_id', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'mensaje' => Upper::class,
        'cliente_nombre' => Upper::class
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d F y', strtotime($value));
    }
}
