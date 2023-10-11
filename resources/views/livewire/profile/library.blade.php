<section id="library">
    @if (is_null($favorite_games) && is_null($games))
        <div id="empty-library">
            <h2 >There is no Game in your library</h2>
            <p class="empty-text">Add some games and return to view them here.</p>
        </div>
    @else
        <aside class="user-game-nav">

            @if (!is_null($favorite_games))
                <div class="user-fav">
                    <h3 class="nav-title">Favorite Games</h3>
                    @foreach ($favorite_games as $g)
                        <p data-id="1-{{ $g->id }}" wire:click.prevent="showGame({{ $g->id }})">{{ $g->name }}</p>
                    @endforeach
                </div>
            @endif
            
            @if (!is_null($games))
                <div class="user-game">
                    <h3 class="nav-title">Games</h3>
                    @foreach ($games as $g)
                        <p data-id="0-{{ $g->id }}" wire:click.prevent="showGame({{ $g->id }})">{{ $g->name }}</p>
                    @endforeach
                </div>
            @endif

            <div class="mobile-user-game-nav">
                <label class="label-game-select" for="game-list">Game list</label>
                <select name="game-list" id="game-list" wire:change="showSelectGame" wire:model="selectedGame">
                    <option class="disabled-option" value="Favorite Games" selected>Select game</option>
                    @if (!is_null($favorite_games))
                        <option class="disabled-option" value="Favorite Games" disabled>Favorite Games :</option>
                        @foreach ($favorite_games as $g)
                            <option value="{{ $g->id }}" wire:click.prevent="showGame({{ $g->id }})">
                                {{ $g->name }}
                            </option>
                        @endforeach
                    @endif
                    @if (!is_null($games))
                        <option class="disabled-option" value="Games" disabled>Games :</option>
                        @foreach ($games as $g)
                            <option value="{{ $g->id }}" wire:click.prevent="showGame({{ $g->id }})">
                                {{ $g->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

        </aside>

        <div  wire:loading wire:target="showGame">
            <x-loader></x-loader>
        </div>

        @if ($is_selected_game === true)
            <div wire:loading.remove wire:target="showGame" id="show-game">
                @livewire('profile.game-component', ['game_id' => $game_id_selected], key($game_id_selected))
            </div>
            
        @endif
    @endif
</section>
