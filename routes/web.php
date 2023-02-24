<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('pages.home');

Route::resource('products', Controllers\ProductController::class)
    ->scoped(['product' => 'slug'])
    ->only(['show']);

Route::get('/checkout', Controllers\CheckoutController::class)->name('pages.checkout');
Route::get('/thanks', Controllers\ThanksController::class)->name('pages.thanks');

Route::view('/terms-conditions', 'pages.terms')->name('pages.terms');
Route::view('/privacy-policy', 'pages.privacy')->name('pages.privacy');
