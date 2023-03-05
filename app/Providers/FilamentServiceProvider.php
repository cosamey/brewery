<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/filament.css');

            Filament::registerNavigationGroups([
                'Products',
                'Shop',
                'Management',
            ]);
        });
    }
}
