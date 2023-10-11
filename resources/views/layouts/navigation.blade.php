<nav x-data="{ open: false }" class="navigation">
    <!-- Primary Navigation Menu -->
    <div class="navigation-desktop">
        <div>
            <div class="navigation-desktop-links">

                <!-- Navigation Links -->
                <div class="navigation-desktop-link">
                    <x-nav-link :href="route('homepage')" :active="request()->routeIs('homepage')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                @if (Auth::user() && Auth::user()->isAdmin())
                    <div class="navigation-desktop-link">
                        <x-nav-link :href="route('admin.index')">
                            {{ __('Admin') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="navigation-desktop-dropdown">
                @if (Auth::user())
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="navigation-desktop-dropdown-button">
                                <span id="desktop-username">{{ Auth::user()->name }}</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')">
                                {{ __('Profile information') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile.library')">
                                {{ __('Library') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('profile.wishlist')">
                                {{ __('Wishlist') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}">{{ __('Log In') }}</a>

                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="navigation-hamburger">
                <button @click="open = ! open">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            style="display: inline-flex;" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'navigation-mobile-block': open, 'navigation-mobile-hidden': !open }"
        class="navigation-mobile-hidden navigation-mobile">
        <div>
            <x-responsive-nav-link :href="route('homepage')" :active="request()->routeIs('homepage')">
                {{ __('Home') }}
            </x-responsive-nav-link>

            @if (Auth::user() && Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                    {{ __('Admin') }}
                </x-responsive-nav-link>
            @endif

            @if (Auth::guest())
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endif
        </div>

        @if (Auth::user())
            <!-- Responsive Settings Options -->
            <div class="navigation-mobile-options">
                <div class="navigation-mobile-user">
                    <span id="mobile-username">{{ Auth::user()->name }}</span>
                    <span>{{ Auth::user()->email }}</span>
                </div>

                <div class="navigation-mobile-links">
                    <x-responsive-nav-link :href="route('profile')">
                        {{ __('Profile information') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.library')">
                        {{ __('Library') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.wishlist')">
                        {{ __('Wishlist') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
