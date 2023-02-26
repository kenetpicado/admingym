<?php

namespace App\Services;

use App\Services\DateService;

class CollectionService
{
    public function setMonthName($collection)
    {
        $result = $collection->map(function ($item, $key) {
            return [
                'mes' => (new DateService)->monthName($item->mes),
                'total' => $item->total
            ];
        });

        return $result;
    }
}
