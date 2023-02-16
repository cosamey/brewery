<?php

namespace App\Enums;

enum CartStatus: string
{
    case Open = 'open';
    case Closed = 'closed';
    case Abandoned = 'abandoned';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            'open' => __('open'),
            'closed' => __('closed'),
            'abandoned' => __('abandoned'),
            'completed' => __('completed'),
        };
    }
}
