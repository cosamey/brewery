<?php

namespace App\Services;

use App\Enums\CartStatus;
use App\Models\{Cart, Product};
use Illuminate\Support\Collection;

class CartService
{
    protected ?Cart $cart;

    public function __construct()
    {
        $this->cart = $this->retrieveCart();
    }

    public function add(Product $product, int $quantity = 1): void
    {
        if (! $this->cart) {
            $this->cart = $this->createCart();
        }

        $item = $this->cart->items()->firstOrNew(
            ['product_id' => $product->id],
            [
                'name' => $product->name,
                'tax_rate' => $product->tax_rate,
                'price' => $product->price,
            ],
        );

        $item->quantity += $quantity;
        $item->save();
    }

    public function remove(string $itemId): void
    {
        $this->cart?->items()->where('id', $itemId)->delete();
    }

    public function items(): Collection
    {
        return $this->cart?->items ?? collect();
    }

    public function count(): int
    {
        return $this->cart?->items->sum(fn ($item) => $item->quantity) ?? 0;
    }

    public function tax(): float
    {
        return $this->cart?->items->sum('tax') ?? 0;
    }

    public function total(): float
    {
        return $this->cart?->items->sum('total') ?? 0;
    }

    public function model(): ?Cart
    {
        return $this->cart;
    }

    protected function retrieveCart(): ?Cart
    {
        $cartId = session()->get('cart_id');

        if (! $cartId) {
            return null;
        }

        return Cart::query()
            ->where('id', $cartId)
            ->where('status', CartStatus::Open)
            ->with(['items'])
            ->first();
    }

    protected function createCart(): Cart
    {
        $cart = Cart::create();

        session()->put('cart_id', $cart->id);

        return $cart;
    }
}
