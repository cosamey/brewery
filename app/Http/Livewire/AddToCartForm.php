<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;

class AddToCartForm extends Component
{
    public Product $product;

    public function add(int $quantity = 1): void
    {
        if ($quantity < 1) {
            return;
        }

        cart()->add($this->product, $quantity);

        $this->emitTo('mini-cart', 'productAddedToCart');
    }

    public function render(): View
    {
        return view('livewire.add-to-cart-form');
    }
}
