<?php

namespace App\Models;

use App\Casts\Ucfirst;
use App\Casts\Upper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Ingreso extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'concepto',
        'descripcion',
        'monto',
        'beca',
        'created_at',
        'plan_id'
    ];

    protected $casts = [
        'concepto' => Upper::class,
    ];

    public function getFormatCreatedAtAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }
}
