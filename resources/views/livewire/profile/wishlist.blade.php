<div id="wishlist">
    <ul>
        @foreach ($games as $game)
            <li class="wished-game">
                @if (is_null($game->cover))
                    <img src="{{ asset('image/default-game-picture.jpg') }}" alt="Default cover">
                @else
                    <img src="{{ $game->cover->getUrl('thumb', true) }}" alt="Cover of {{ $game->name }}">
                @endif
                @if (is_array($game->slug))
                    <h3><a href="{{ route('show.game', ['slug' => $game->slug[0]]) }}">{{ $game->name }}</a></h3>
                @else
                    <h3><a href="{{ route('show.game', ['slug' => $game->slug]) }}">{{ $game->name }}</a></h3>
                @endif
            </li>
        @endforeach
    </ul>
</div>
