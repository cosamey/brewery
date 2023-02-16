<?php

namespace App\Enums;

enum AddressType: string
{
    case Billing = 'billing';
    case Shipping = 'shipping';

    public function label(): string
    {
        return match ($this) {
            'billing' => __('billing'),
            'shipping' => __('shipping'),
        };
    }
}
