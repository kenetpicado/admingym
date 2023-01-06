<?php  

namespace App\Services;

class PercentageService
{
	public function get($total, $current): float
	{
		if ($total == 0 || $current == 0)
			return 0;

		return round(($current * 100) / $total, 1);
	}

	public function getWithCondition($model, $column, $value)
	{
		if ($model->count() <= 0) 
			return 0;

		return round($model->where($column, $value)->count() * 100 / $model->count(), 1);
	}
}
