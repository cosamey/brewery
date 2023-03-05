<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index', [
            'products' => Product::query()
                ->active()
                ->with(['image'])
                ->get(),
        ]);
    }

    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product->load(['image', 'category', 'brand', 'allergens']),
        ]);
    }
}
