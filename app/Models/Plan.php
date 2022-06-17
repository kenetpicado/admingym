<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Reporte;
use Carbon\Carbon;

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
        $inspected = Registro::where('created_at', Carbon::now()->format('Y-m-d'))->latest('id')->first();

        if ($inspected == null) {

            $planes = Plan::all(['id', 'fecha_fin', 'plan', 'cliente_id']);
            $status = 0;

            foreach ($planes as $plan) {

                if (date('Y-m-d') >= $plan->fecha_fin) {
                    Reporte::create([
                        'mensaje' =>  $plan->plan,
                        'cliente_id' =>  $plan->cliente_id,
                        'created_at' => Carbon::now(),
                    ]);
                    $plan->delete();
                    $status++;
                }
            }
            return Registro::create([
                'created_at' => Carbon::now()->format('Y-m-d'),
                'status' => $status,
            ]);
        } else {
            return $inspected;
        }
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function setNotaAttribute($value)
    {
        $this->attributes['nota'] = trim(ucfirst(strtolower($value)));
    }

    public function getNotaAttribute($value)
    {
        return trim(ucfirst(strtolower($value)));
    }
}
