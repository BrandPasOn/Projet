<?php

namespace App\Http\Livewire\Profile;

use App\Models\UserWishedGame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;

class WishlistComponent extends Component
{
    public $user;

    public $user_wished_games;
    public $user_wished_games_id = [];

    public $games;

    public function mount()
    {
        $this->user = Auth::user();

        $this->getWishedGames();
    }

    public function render()
    {
        return view('livewire.profile.wishlist');
    }

    public function getWishedGames()
    {
        $this->user_wished_games = UserWishedGame::where('user_id', $this->user->id)->get();
        foreach ($this->user_wished_games as $game) {
            $this->user_wished_games_id[] = $game->game_id;
        }
        $this->games = Game::whereIn('id', $this->user_wished_games_id)
            ->with(['themes' => ['*'], 'cover' => ['*']])
            ->get();
    }
}
