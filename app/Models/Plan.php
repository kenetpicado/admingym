<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Reporte;
use App\Casts\Ucfirst;
use App\Casts\Ucwords;
use App\Casts\Upper;
use Illuminate\Support\Facades\DB;

class Plan extends Model
{
    use HasFactory;
    protected $table = "planes";
    public $timestamps = false;

    protected $fillable = [
        'servicio',
        'plan',
        'monto',
        'beca',
        'nota',
        'fecha_fin',
        'created_at',
        'cliente_id'
    ];

    protected $casts = [
        'nota' => Ucfirst::class,
        'cliente_nombre' => Ucwords::class
    ];

    //Borrar expirados
    public static function deleteExpired()
    {
        $planes = Plan::where('fecha_fin', '<=', now()->format('Y-m-d'))->get();

        $registro = Registro::create([
            'created_at' => now()->format('Y-m-d'),
            'status' => $planes->count(),
        ]);

        foreach ($planes as $plan) {
            Reporte::create([
                'mensaje' => $plan->plan,
                'cliente_id' => $plan->cliente_id,
                'created_at' => now()->format('Y-m-d'),
            ]);
            $plan->delete();
        }

        return $registro;
    }

    public static function index()
    {
        return Plan::select([
            'planes.id',
            'clientes.nombre as cliente_nombre',
            'created_at',
            'fecha_fin',
            'nota',
            'servicio'
        ])
            ->join('clientes', 'planes.cliente_id', '=', 'clientes.id')
            ->orderBy('fecha_fin')
            ->get();
    }

    public static function show($plan_id)
    {
        return Plan::where('planes.id', $plan_id)
            ->select([
                'planes.*',
                'clientes.nombre as cliente'
            ])
            ->join('clientes', 'planes.cliente_id', '=', 'clientes.id')
            ->first();
    }
}
