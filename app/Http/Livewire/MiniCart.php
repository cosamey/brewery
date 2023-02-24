<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class MiniCart extends Component
{
    public bool $open = false;

    protected $listeners = [
        'productAddedToCart' => 'openMiniCart',
    ];

    public function remove(string $itemId): void
    {
        cart()->remove($itemId);
    }

    public function openMiniCart(): void
    {
        $this->open = true;
    }

    public function render(): View
    {
        return view('livewire.mini-cart', [
            'items' => cart()->items(),
            'count' => cart()->count(),
            'total' => cart()->total(),
        ]);
    }
}
