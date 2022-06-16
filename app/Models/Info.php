<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    
    public static function getRange($model, $start, $end)
    {
        return $model->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->get();
    }

}
