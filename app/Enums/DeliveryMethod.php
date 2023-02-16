<?php

namespace App\Enums;

enum DeliveryMethod: string
{
    case Pickup = 'pickup';
    case Courier = 'courier';

    public function label(): string
    {
        return match ($this) {
            'pickup' => __('pickup'),
            'courier' => __('courier'),
        };
    }
}
