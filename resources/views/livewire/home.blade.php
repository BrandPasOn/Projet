<div class="home-component">
    <div class="home-main">
        <div x-data='{search : false}' class="home-main-nav dropdown">
            <button id="nav-1" class="main-nav-link">Genre</button>
            <div id="nav-1-dropdown" style="display: none" class="dropdown-menu">
                <ul class="dropdown-list">
                    @foreach ($genre as $g)
                        <li class="home-aside-category-li">
                            <a href="{{ route('categorypage', ['category' => 'genre', 'slug' => $g->slug]) }}">{{ $g->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <button id="nav-2" class="main-nav-link">Theme</button>
            <div id="nav-2-dropdown" style="display: none" class="dropdown-menu">
                <ul class="dropdown-list">
                    @foreach ($theme as $t)
                        <li class="home-aside-category-li">
                            <a href="{{ route('categorypage', ['category' => 'theme', 'slug' => $t->slug]) }}">{{ $t->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <button id="nav-3" class="main-nav-link">Game mode</button>
            <div id="nav-3-dropdown" style="display: none" class="dropdown-menu">
                <ul class="dropdown-list-game-mode">
                    @foreach ($mode as $m)
                        <li class="home-aside-category-li">
                            <a href="{{ route('categorypage', ['category' => 'game-mode', 'slug' => $m->slug]) }}">{{ $m->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <label for="search" style="display: none"></label>
            <input id="search" name="search" type="search" class="text-input" wire:model="search" placeholder="Search games by name...">
            <div id="search-value" x-show="search" class="dropdown-menu" style="display: none">
                <ul class="dropdown-list-search">
                    @if ($game_searched)
                        @foreach ($game_searched as $game)
                            <li class="home-aside-category-li">
                                <a href="{{ route('show.game', ['slug' => is_array($game->slug) ? $game->slug[0] : $game->slug]) }}">{{ $game->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <section class="home-popular-games">
            <h2 class="random-games-title">Popular Games</h2>
            <div class="card-list home-card-list">
                @foreach ($mostPopularGames as $game)
                    <article>
                        @if (is_array($game->slug))
                            <a href="{{ route('show.game', ['slug' => $game->slug[0]]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('thumb', true) }}" alt="Cover of {{ $game->name }}">
                                @endif
                                <h3>{{ $game->name }}</h3>
                            </a>
                        @else
                            <a href="{{ route('show.game', ['slug' => $game->slug]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('thumb', true) }}" alt="Cover of {{ $game->name }}">
                                @endif
                                <h3>{{ $game->name }}</h3>
                            </a>
                        @endif


                    </article>
                @endforeach
            </div>
        </section>

        
        <section class="home-random-games">
            <h2 class="random-games-title">Games</h2>
            <div class="card-list home-card-list">
                @foreach ($randomGames as $game)
                    <article>
                        @if (is_array($game->slug))
                            <a href="{{ route('show.game', ['slug' => $game->slug[0]]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('thumb', true) }}" alt="Cover of {{ $game->name }}">
                                @endif
                                <h3>{{ $game->name }}</h3>
                            </a>
                        @else
                            <a href="{{ route('show.game', ['slug' => $game->slug]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('thumb', true) }}" alt="Cover of {{ $game->name }}">
                                @endif
                                <h3>{{ $game->name }}</h3>
                            </a>
                        @endif


                    </article>
                @endforeach
            </div>
        </section>

    </div>
</div>
