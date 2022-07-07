<?php

namespace App\Models;

use App\Casts\Ucfirst;
use App\Casts\Ucwords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;
use App\Models\Reporte;
use App\Models\Peso;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'email', 'fecha', 'sexo'];
    public $timestamps = false;

    protected $casts = [
        'nombre' => Ucwords::class,
        'email' => Ucfirst::class,
    ];

    public static function getClientes()
    {
        return DB::table('clientes')
            ->select([
                'id',
                'nombre',
                'sexo',
                DB::raw('(select count(*) from `planes` where `clientes`.`id` = `planes`.`cliente_id`) as `planes_count`')
            ])
            ->get();
    }

    public function planes()
    {
        return $this->hasMany(Plan::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
    public function pesos()
    {
        return $this->hasMany(Peso::class);
    }
}
