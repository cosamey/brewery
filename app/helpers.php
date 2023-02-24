<?php

if (! function_exists('cart')) {
    function cart(): App\Services\CartService
    {
        return app('cart');
    }
}

if (! function_exists('price_format')) {
    function price_format(float $price, string $currency = 'EUR'): string
    {
        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY);

        return $formatter->formatCurrency($price, $currency);
    }
}
