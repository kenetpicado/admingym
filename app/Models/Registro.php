<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = ['created_at', 'status'];
    
    public $timestamps = false;

    public function scopeFromToday($query)
    {
        return $query->where('created_at', date('Y-m-d'))->latest('id')->first() ?? false;
    }
}
