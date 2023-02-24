<?php

namespace App\Models;

use App\Casts\Money;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};

class Item extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'cart_id',
        'product_id',
        'name',
        'quantity',
        'tax_rate',
        'price',
    ];

    protected $casts = [
        'quantity' => 'int',
        'tax_rate' => 'int',
        'price' => Money::class,
    ];

    protected function tax(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->quantity * ($this->price / (1 + ($this->tax_rate / 100))) * ($this->tax_rate / 100),
        );
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->quantity * $this->price,
        );
    }

    public function cart(): Relations\BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
