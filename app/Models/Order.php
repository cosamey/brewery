<?php

namespace App\Models;

use App\Enums\{DeliveryMethod, PaymentMethod};
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'cart_id',
        'customer_id',
        'address_id',
        'status',
        'payment_method',
        'delivery_method',
        'notes',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'payment_method' => PaymentMethod::class,
        'delivery_method' => DeliveryMethod::class,
    ];

    public function cart(): Relations\BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function customer(): Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function address(): Relations\BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
