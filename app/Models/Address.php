<?php

namespace App\Models;

use App\Enums\AddressType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};

class Address extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'customer_id',
        'type',
        'street',
        'city',
        'post_code',
        'region',
        'state',
        'country_code',
    ];

    protected $casts = [
        'type' => AddressType::class,
    ];

    public function fullAddress(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->street}, {$this->post_code} {$this->city}, {$this->country->name}"
        );
    }

    public function customer(): Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function country(): Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }

    public function orders(): Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }
}
