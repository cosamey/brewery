<?php

if (! function_exists('cart')) {
    function cart(): App\Services\CartService
    {
        return app('cart');
    }
}
