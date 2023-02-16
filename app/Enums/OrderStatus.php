<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Shipped = 'shipped';
    case Completed = 'completed';
    case Canceled = 'canceled';
    case Refunded = 'refunded';

    public function label(): string
    {
        return match ($this) {
            'pending' => __('pending'),
            'processing' => __('processing'),
            'shipped' => __('shipped'),
            'completed' => __('completed'),
            'canceled' => __('canceled'),
            'refunded' => __('refunded'),
        };
    }
}
