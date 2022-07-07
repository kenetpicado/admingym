<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = ['mensaje', 'cliente_id', 'created_at'];
    public $timestamps = false;

    public static function getReportes()
    {
        return DB::table('reportes')
            ->select([
                'reportes.id',
                'mensaje',
                'created_at',
                'clientes.id as cliente_id',
                'clientes.nombre as cliente_nombre',
            ])
            ->join('clientes', 'reportes.cliente_id', '=', 'clientes.id')
            ->latest('reportes.id')
            ->get();
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
