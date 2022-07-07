<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable = ['created_at', 'status'];
    public $timestamps = false;

    public static function getToday()
    {
        return Registro::where('created_at', now()->format('Y-m-d'))
            ->latest('id')
            ->first();
    }
}
