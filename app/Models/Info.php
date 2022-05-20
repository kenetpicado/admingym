<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    public static function getTotal($model)
    {
        return $model->all('monto')->sum('monto');
    }

    public static function getMonthly($model)
    {
        return $model->where('created_at', '>=', date('Y-m-' . '01'))
            ->get('monto')
            ->sum('monto');
    }

    public static function getRange($model, $start, $end)
    {
        return $model->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->get();
    }

}
