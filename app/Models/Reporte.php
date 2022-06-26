<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = ['mensaje', 'cliente_id', 'created_at'];
    public $timestamps = false;

    public static function orderDesc()
    {
        return Reporte::with('cliente:id,nombre')->orderBy('id', 'desc')->get();
    }

    public static function deleteByUser($cliente_id)
    {
        Reporte::where('cliente_id', $cliente_id)->delete();
    }

    public function getMensajeAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d F Y', strtotime($value));
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
