<?php

namespace App\Models;

use App\Casts\Money;
use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations, SoftDeletes};

class Payment extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'status',
        'amount',
        'meta',
    ];

    protected $casts = [
        'status' => PaymentStatus::class,
        'amount' => Money::class,
        'meta' => 'json',
    ];

    public function order(): Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
