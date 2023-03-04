<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Stripe\StripeClient;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('stripe', fn () => new StripeClient(config('services.stripe.secret')));
    }

    public function boot(): void
    {
        //
    }
}
