<?php

namespace App\Services;

class CurrencyService
{
    public static function format($amount)
    {
        return 'C$ ' . number_format($amount, 1);
    }
}
