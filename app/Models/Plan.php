<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reporte;
use App\Services\DateService;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        }

        Plan::whereIn('id', $planes->pluck('id'))->delete();

        return $registro;
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function addMissingData()
    {
        $this->monto = Precio::getMonto($this->servicio, $this->plan);

        if ($this->beca > 0)
            $this->monto = $this->monto - $this->beca;

        $this->fecha_fin = (new DateService)->getEndDate($this->plan, $this->created_at);
    }

    public function scopeSearching($query, $search)
    {
        return $query->when($search, fn ($q) => $q->whereHas('cliente', fn ($q) => $q->where('nombre', 'like', '%' . $search . '%')));
    }

    public function scopeExpired($query)
    {
        return $query->where('fecha_fin', '<=', date('Y-m-d'));
    }

    public function scopeDeleteIds($query, $ids)
    {
        return $query->whereIn('id', $ids)->delete();
    }

    public function scopeWithCliente($query)
    {
        return $query->with('cliente:id,nombre');
    }
}
