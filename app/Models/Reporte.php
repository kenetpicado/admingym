<?php

namespace App\Models;

use App\Casts\Upper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reporte extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'mensaje',
        'cliente_id',
        'created_at'
    ];

    protected $casts = [
        'mensaje' => Upper::class,
        'cliente_nombre' => Upper::class
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    /* Scopes */
    public function scopeWithCliente($query)
    {
        return $query->with('cliente:id,nombre');
    }

    public function scopeSearching($query, $search)
    {
        return $query->when($search, fn ($q) => $q->whereHas('cliente', fn ($q) => $q->where('nombre', 'like', '%' . $search . '%')));
    }
}
