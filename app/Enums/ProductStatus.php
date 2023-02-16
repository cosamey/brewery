<?php

namespace App\Enums;

enum ProductStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';

    public function label(): string
    {
        return match ($this) {
            'active' => __('active'),
            'inactive' => __('inactive'),
        };
    }
}
