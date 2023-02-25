<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\View\View;

class ThanksController extends Controller
{
    public function __invoke(Request $request): View|RedirectResponse
    {
        $order = Order::find($request->session()->get('order'));

        if (! $order) {
            return to_route('pages.home');
        }

        return view('pages.thanks', [
            'order' => $order,
        ]);
    }
}
