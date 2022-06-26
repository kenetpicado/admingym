<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Peso extends Model
{
    use HasFactory;

    protected $fillable = ['peso', 'cliente_id', 'created_at'];
    public $timestamps = false;

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d F Y', strtotime($value));
    }
}
