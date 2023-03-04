<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __invoke(): View|RedirectResponse
    {
        if (cart()->count() === 0) {
            return to_route('pages.home');
        }

        return view('pages.checkout');
    }
}
