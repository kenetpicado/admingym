<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reporte;

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
}
