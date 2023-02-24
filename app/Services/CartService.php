<?php

namespace App\Services;

use App\Models\{Cart, Product};
use Illuminate\Support\Collection;

class CartService
{
    protected Cart $cart;

    public function __construct()
    {
        $this->cart = $this->retrieveCart();
    }

    public function add(Product $product, int $quantity = 1): void
    {
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
        $this->cart->items()->where('id', $itemId)->delete();
    }

    public function items(): Collection
    {
        return $this->cart->items;
    }

    public function count(): int
    {
        return $this->cart->items->sum(fn ($item) => $item->quantity);
    }

    public function tax(): float
    {
        return $this->cart->items->sum('tax');
    }

    public function total(): float
    {
        return $this->cart->items->sum('total');
    }

    protected function retrieveCart(): Cart
    {
        return Cart::where('id', session()->get('cart_id'))->with(['items'])->firstOr(function () {
            $cart = Cart::create();

            session()->put('cart_id', $cart->id);

            return $cart;
        });
    }
}
