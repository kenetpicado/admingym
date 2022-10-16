<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    use HasFactory;

    protected $fillable = ['peso', 'cliente_id', 'created_at'];
    public $timestamps = false;
}
