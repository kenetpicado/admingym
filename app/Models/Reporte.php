<?php

namespace App\Models;

use App\Casts\Upper;
use App\Models\Cliente;
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

    public function getFormatCreatedAtAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function scopeWithCliente($query)
    {
        return $query->addSelect([
            'cliente_nombre' => Cliente::select('nombre')
                ->whereColumn('clientes.id', 'reportes.cliente_id')
                ->limit(1)
        ]);
    }

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
}
