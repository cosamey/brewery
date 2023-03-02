<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ShippingSettings extends Settings
{
    public array $delivery_methods;

    public array $payment_methods;

    public static function group(): string
    {
        return 'shipping';
    }
}
