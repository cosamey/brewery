<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::with(['thumbnail'])->active()->get();

        return view('pages.home', [
            'featuredProducts' => $products->where('is_featured', true)->all(),
            'products' => $products,
        ]);
    }
}
