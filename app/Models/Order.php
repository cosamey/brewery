<?php

namespace App\Models;

use App\Casts\Money;
use App\Enums\{DeliveryMethod, OrderStatus, PaymentMethod};
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations, SoftDeletes};

class Order extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'cart_id',
        'customer_id',
        'shipping_address_id',
        'billing_address_id',
        'status',
        'payment_method',
        'delivery_method',
        'fees',
        'total',
        'notes',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'payment_method' => PaymentMethod::class,
        'delivery_method' => DeliveryMethod::class,
        'fees' => 'json',
        'total' => Money::class,
    ];

    public function cart(): Relations\BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function customer(): Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function shippingAddress(): Relations\BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function billingAddress(): Relations\BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function payment(): Relations\HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
