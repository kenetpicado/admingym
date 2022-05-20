<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Reporte extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public static function deleteByUser($cliente_id)
    {
        if (Reporte::where('cliente_id', $cliente_id)->get()->count() > 0) {
            Reporte::destroy(Reporte::where('cliente_id', $cliente_id)->get());
        }
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}
