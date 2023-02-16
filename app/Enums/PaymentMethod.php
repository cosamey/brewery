<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case Card = 'card';
    case Cash = 'cash';
    case Transfer = 'transfer';

    public function label(): string
    {
        return match ($this) {
            'card' => __('card'),
            'cash' => __('cash'),
            'transfer' => __('transfer'),
        };
    }
}
