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
        Reporte::where('cliente_id', $cliente_id)->delete();
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
