<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.checkout', [
            'items' => cart()->items(),
            'tax' => cart()->tax(),
            'total' => cart()->total(),
        ]);
    }
}
