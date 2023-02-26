<?php

namespace App\Models;

use App\Models\Cliente;
use App\Services\DateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function cliente(): BelongsTo
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function addMissingData()
    {
        $this->monto = Precio::getMonto($this->servicio, $this->plan);

        if ($this->beca > 0) {
            $this->monto = $this->monto - $this->beca;
        }

        $this->fecha_fin = (new DateService)->getEndDate($this->plan, $this->created_at);
    }

    /* SCOPES */
    public function scopeSearching($query, $search)
    {
        if ($search) {
            $query->whereIn('cliente_id', function ($q) use ($search) {
                $q->select('id')
                    ->from('clientes')
                    ->where('nombre', 'like', '%' . $search . '%');
            });
        }
    }

    public function scopeExpired($query)
    {
        return $query->where('fecha_fin', '<=', date('Y-m-d'));
    }

    public function scopeWithCliente($query)
    {
        return $query->addSelect([
            'cliente_nombre' => Cliente::select('nombre')
                ->whereColumn('clientes.id', 'planes.cliente_id')
                ->limit(1)
        ]);
    }
}
