<?php

namespace App\Models;

use App\Casts\Ucwords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha', 'sexo'];
    public $timestamps = false;

    protected $casts = [
        'nombre' => Ucwords::class,
    ];

    public static function index()
    {
        return DB::table('clientes')
            ->select([
                'id',
                'nombre',
                'sexo',
                DB::raw('(select count(*) from planes where clientes.id = planes.cliente_id) as planes_count')
            ])
            ->paginate(20);
    }

    public function planes()
    {
        return $this->hasMany(Plan::class);
    }
}
