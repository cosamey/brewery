<?php

namespace App\Models;

use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};

class Customer extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'type',
        'email',
        'phone',
    ];

    protected $casts = [
        'type' => CustomerType::class,
    ];

    public function addresses(): Relations\HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function carts(): Relations\HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orders(): Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }
}