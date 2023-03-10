<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="shortcut icon" type="image/svg+xml" href="/favicon.svg" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>

    <body>
        @include('layouts.partials.header')

        <main>
            {{ $slot }}
        </main>

        @include('layouts.partials.footer')

        @livewireScripts
    </body>
</html>
