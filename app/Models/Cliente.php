<?php

namespace App\Models;

use App\Casts\Ucwords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha', 'sexo'];
    public $timestamps = false;

    protected $casts = [
        'nombre' => Ucwords::class,
    ];

    public function planes()
    {
        return $this->hasMany(Plan::class);
    }
}
