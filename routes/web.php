<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('pages.home');

Route::resource('products', Controllers\ProductController::class)
    ->scoped(['product' => 'slug'])
    ->only(['show']);

