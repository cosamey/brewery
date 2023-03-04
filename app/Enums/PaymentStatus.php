<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Canceled = 'canceled';
    case Refunded = 'refunded';

    public function label(): string
    {
        return match ($this) {
            'pending' => __('pending'),
            'paid' => __('paid'),
            'canceled' => __('canceled'),
            'refunded' => __('refunded'),
        };
    }
}
