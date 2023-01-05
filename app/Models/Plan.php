<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    /* SCOPES */
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
