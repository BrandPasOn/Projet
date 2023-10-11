<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Meats | @yield('title')</title>



    <!-- Scripts -->
    @vite(['resources/css/error.css','resources/css/profile.css','resources/css/game.css', 'resources/css/contact.css', 'resources/css/footer.css', 'resources/css/layout.css', 'resources/css/navigation.css', 'resources/css/auth.css', 'resources/css/home-components.css', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/alert.js', 'resources/js/search.js', 'resources/js/username.js', 'resources/js/library.js'])

    @livewireStyles
</head>

<body>
    <x-alert></x-alert>

    <main class="app-layout">
        @include('layouts.navigation')

        {{-- @livewire('flash') --}}

        @if (session('error'))
            <div style="background-color: red">
                {{ session('error') }}
            </div>
        @endif


        <!-- Page Content -->
        <section class="app-layout-main">
            @yield('content')
        </section>
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
    @livewireScripts
    <script>
        window.addEventListener('urlChanged', () => {
            console.log('coucou')
        })
        Livewire.on('urlChanged', function(url) {
            window.history.pushState({}, '', url);
        });
    </script>

</body>

</html>
