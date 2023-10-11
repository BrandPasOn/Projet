<section class="game-component">
    <div class="game-picture">

        <img src="{{ $game->cover ? $game->cover->getUrl('cover_big') : asset('image/default-game-picture.jpg') }}" alt="Cover of {{ $game->name }}">
    </div>
    <h1 class="game-title">{{ $game->name }}</h1>

    @if (Auth::user())
        <section class="game-submit">
            <div class="add-game">
                @if (is_null($game_possessed))
                    <button class="add-game-button" wire:click.prevent="addGame">Add to library</button>
                @else
                    <button class="remove-game-button" wire:click.prevent="removeGame">Remove from library</button>
                @endif

            </div>
            <div class="add-game">
                @if (!isset($game_possessed))
                    @if (is_null($game_wished))
                        <button class="add-game-button" wire:click.prevent="addToWishedGame">Add to wishlist</button>
                    @else
                        <button class="remove-game-button" wire:click.prevent="removeFromWishedGame">Remove from
                            wishlist</button>
                    @endif
                @endif
            </div>
        </section>
    @endif
    @if (!is_null($similar_games) && !empty($similar_games))
        <section class="similar-games">
            <h2>Similar Games :</h2>

            <div class="card-list">
                @foreach ($similar_games as $game)
                    <article>
                        @if (is_array($game->slug))
                            <a href="{{ route('show.game', ['slug' => $game->slug[0]]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('cover_big') }}" alt="Cover of {{ $game->name }}">
                                @endif
                                <h3>{{ $game->name }}</h3>
                            </a>
                        @else
                            <a href="{{ route('show.game', ['slug' => $game->slug]) }}">
                                @if (is_null($game->cover))
                                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                                @else
                                    <img src="{{ $game->cover->getUrl('cover_big') }}" alt="Cover of {{ $game->name }}">
                                @endif
                                <h3>{{ $game->name }}</h3>
                            </a>
                        @endif
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    @livewire('comment-component', ['user' => $user, 'game_selected_id' => $game_selected_id], key($game_selected_id))
</section>
