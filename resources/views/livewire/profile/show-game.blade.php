<section id="game">
    <h2><a href="{{ route('show.game',  $game->slug ) }}">{{ $game->name }}</a></h2>
    @if ($game->cover)
        <img src="{{ $game->cover->getUrl('720p') }}" alt="Cover of {{ $game->name }}">
    @else
        <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
    @endif

    <div class="fav">
        @if ($verifyIsFav === 1)
            <button class="remove-game-button" wire:click.prevent="addToFav({{ $game->id }},1)">Remove from Fav</button>
        @else
            <button class="add-game-button" wire:click.prevent="addToFav({{ $game->id }},0)">Add to Fav</button>
        @endif
    </div>

    @livewire('profile.note-component', ['user' => $user, 'game_id_selected' => $game_id_selected])
</section>
