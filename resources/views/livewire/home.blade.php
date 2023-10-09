<div class="home-component">
    <div class="home-main">
        <div x-data='{ open1: false, open2: false, open3: false, search : false , search : false}'
            class="home-main-nav dropdown">
            <button x-on:click="open1 = !open1" @click.away="open1 = false" class="main-nav-link">Genre</button>
            <div x-cloak x-show="open1" class="dropdown-menu">
                <ul class="dropdown-list">
                    @foreach ($genre as $g)
                        <li class="home-aside-category-li">
                            <a
                                href="{{ route('categorypage', ['category' => 'genre', 'slug' => $g->slug]) }}">{{ $g->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <button x-on:click="open2 = !open2" class="main-nav-link">Theme</button>
            <div x-cloak x-show="open2" @click.away="open2 = false" class="dropdown-menu">
                <ul class="dropdown-list">
                    @foreach ($theme as $t)
                        <li class="home-aside-category-li">
                            <a
                                href="{{ route('categorypage', ['category' => 'theme', 'slug' => $t->slug]) }}">{{ $t->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <button x-on:click="open3 = !open3" class="main-nav-link">Game mode</button>
            <div x-cloak x-show="open3" @click.away="open3 = false" class="dropdown-menu">
                <ul class="dropdown-list-game-mode">
                    @foreach ($mode as $m)
                        <li class="home-aside-category-li">
                            <a
                                href="{{ route('categorypage', ['category' => 'game-mode', 'slug' => $m->slug]) }}">{{ $m->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <label for="search" style="display: none"></label>
            <input id="search" name="search" type="search" class="text-input" wire:model="search"
                placeholder="Search games by name...">
            <div id="search-value" x-cloak x-show="search" @click.away="search = false" class="dropdown-menu"
                style="display: none">
                <ul class="dropdown-list-search">
                    @if ($game_searched)
                        @foreach ($game_searched as $game)
                            <li class="home-aside-category-li">
                                @if (is_array($game->slug))
                                    <a
                                        href="{{ route('show.game', ['slug' => $game->slug[0]]) }}">{{ $game->name }}</a>
                                @else
                                    <a href="{{ route('show.game', ['slug' => $game->slug]) }}">{{ $game->name }}</a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <section class="home-popular-games">
            <h2 class="popular-games-title">Popular Games</h2>
            <div class="card-list home-card-list">
                @foreach ($mostPopularGames as $game)
                    <article>
                        @if (is_array($game->slug))
                            <a href="{{ route('show.game', ['slug' => $game->slug[0]]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('thumb', true) }}"
                                        alt="Cover of {{ $game->name }}">
                                @endif
                                <h3>{{ $game->name }}</h3>
                            </a>
                        @else
                            <a href="{{ route('show.game', ['slug' => $game->slug]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('thumb', true) }}"
                                        alt="Cover of {{ $game->name }}">
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
