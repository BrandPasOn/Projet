<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/admin.css','resources/css/layout.css','resources/css/navigation.css','resources/css/auth.css','resources/css/home-components.css', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/alert.js'])


    @livewireStyles
    
</head>

<body>

    <x-alert></x-alert>

    <main class="app-layout">
        @include('layouts.navigation')

        
        @if(session('error'))
            <div style="background-color: red">
                {{ session('error') }}
            </div>
        @endif

        <!-- Page Content -->
        <section class="app-layout-main">
            @yield('content')
        </section>
    </main>
    @livewireScripts
    <script>
        Livewire.on('urlChanged', function(url) {
            window.history.pushState({}, '', url);
        });
    </script>
    
</body>

</html>
