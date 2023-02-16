<?php

namespace App\Models;

use App\Enums\CartStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};

class Cart extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'customer_id',
        'status',
    ];

    protected $casts = [
        'status' => CartStatus::class,
    ];

    public function customer(): Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): Relations\HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function order(): Relations\HasOne
    {
        return $this->hasOne(Order::class);
    }
}
