<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    use HasFactory;

    protected $fillable = ['peso', 'cliente_id', 'created_at'];
    public $timestamps = false;

    public function scopeCliente($query, $cliente_id)
    {
        return $query->where('cliente_id', $cliente_id);
    }

    public function getCreatedAttribute()
    {
        return date('d-m-Y', strtotime($this->attributes['created_at']));
    }
}
