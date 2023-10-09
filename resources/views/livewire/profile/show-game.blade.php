<section>
    <h2>{{ $game->name }}</h2>
    @if ($game->cover)
        <img src="{{ $game->cover->getUrl('thumb') }}" alt="Cover of {{ $game->name }}">
    @else
        <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
    @endif

    @if ($verifyIsFav === 1)
        <button class="remove-game-button" wire:click.prevent="addToFav({{ $game->id }})">Remove from Fav</button>
    @else
        <button class="add-game-button" wire:click.prevent="addToFav({{ $game->id }})">Add to Fav</button>
    @endif

    @livewire('profile.note-component', ['user' => $user, 'game_id_selected' => $game_id_selected])
</section>
