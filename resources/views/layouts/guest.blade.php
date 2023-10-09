<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/layout.css','resources/css/navigation.css','resources/css/auth.css','resources/css/home-components.css', 'resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <section class="guest-layout">
            <div class="guest-layout-wrapper">
                {{ $slot }}
            </div>
        </section>
    </body>
</html>
