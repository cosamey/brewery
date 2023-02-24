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
                ->with(['thumbnail'])
                ->get(),
        ]);
    }

    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product->load(['thumbnail', 'category', 'brand', 'allergens']),
        ]);
    }
}
