<section id="library">
    <aside class="user-game-nav">
        <div class="desktop-user-game-nav">
            @if (!is_null($favorite_games))
                <div style="background-color: antiquewhite">
                    @foreach ($favorite_games as $g)
                        <p wire:click.prevent="showGame({{ $g->id }})">{{ $g->name }} fav</p>
                    @endforeach
                </div>
            @endif
            @if (!is_null($games))
                <div style="background-color:aquamarine">
                    @foreach ($games as $g)
                        <p wire:click.prevent="showGame({{ $g->id }})">{{ $g->name }} pas fav</p>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="mobile-user-game-nav">
            <label class="label-game-select" for="game-list">Game list</label>
            <select name="game-list" id="game-list" wire:change="showSelectGame" wire:model="selectedGame">
                <option class="disabled-option" value="Favorite Games" disabled selected>Select game</option>
                @if (!is_null($favorite_games))
                    <option class="disabled-option" value="Favorite Games" disabled>Favorite Games :</option>
                    @foreach ($favorite_games as $g)
                        <option value="{{ $g->id }}" wire:click.prevent="showGame({{ $g->id }})">{{ $g->name }}</option>
                    @endforeach
                @endif
                @if (!is_null($games))
                    <option class="disabled-option" value="Games" disabled>Games :</option>
                    @foreach ($games as $g)
                        <option value="{{ $g->id }}" wire:click.prevent="showGame({{ $g->id }})">{{ $g->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

    </aside>

    <div wire:loading>
        Loading ...
    </div>

    @if ($is_selected_game === true)
        <div wire:loading.remove>
            @livewire('profile.game-component', ['game_id' => $game_id_selected], key($game_id_selected))
        </div>
    @else
        <div wire:loading.remove>
            no
        </div>
    @endif

</section>
