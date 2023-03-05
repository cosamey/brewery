<?php

namespace App\Models;

use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};

class Customer extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'first_name',
        'last_name',
        'type',
        'company',
        'email',
        'phone',
        'meta',
    ];

    protected $casts = [
        'type' => CustomerType::class,
        'meta' => 'json',
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->first_name} {$this->last_name}"
        );
    }

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
