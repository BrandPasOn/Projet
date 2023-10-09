<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserGame;
use App\Models\UserWishedGame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;

class GameComponent extends Component
{
    protected $game;
    public $game_possessed;
    public $game_wished;
    public $game_slug;
    public $game_selected_id;
    public $similar_games = [];

    public $user;

    public function render()
    {
        $this->game = Game::where('slug', $this->game_slug)
            ->with(['cover' => ['*'], 'similar_games' => ['*']])
            ->first();

        if ($this->game && $this->game->similar_games) {
            $this->similar_games = Game::whereIn('id', $this->game->similar_games->pluck('id')->toArray())
                ->with(['cover' => ['*']])
                ->limit(4)
                ->get();

            $this->game_selected_id = $this->game->id;
        }

        if (Auth::user()) {
            $this->user = User::find(Auth::user()->id);
            // possessed games
            $this->game_possessed = UserGame::where('user_id', $this->user->id)
                ->where('game_id', $this->game_selected_id)
                ->first();
            // wished games
            $this->game_wished = UserWishedGame::where('user_id', $this->user->id)
                ->where('game_id', $this->game_selected_id)
                ->first();
        }

        // dd($this->game);

        return view('livewire.game.show', ['game' => $this->game, 'similar_games' => $this->similar_games]);
    }

    public function addGame()
    {
        UserGame::firstOrCreate([
            'user_id' => $this->user->id,
            'game_id' => $this->game_selected_id,
        ]);

        $verify = UserWishedGame::where('game_id', $this->game_selected_id)
            ->where('user_id', $this->user->id)
            ->first();

        if (!is_null($verify)) {
            $verify->delete();
        }

        $this->dispatchBrowserEvent('alert', ['message' => 'Game added to your library', 'type' => 'success']);
    }

    public function removeGame()
    {
        $user_game = UserGame::where('user_id', $this->user->id)
            ->where('game_id', $this->game_selected_id)
            ->first();
        $user_game->delete();

        $this->dispatchBrowserEvent('alert', ['message' => 'Game removed from your library', 'type' => 'success']);
    }

    public function addToWishedGame()
    {
        $verify = UserGame::where('user_id', $this->user->id)
            ->where('game_id', $this->game_selected_id)
            ->first();

        if (is_null($verify)) {
            UserWishedGame::firstOrCreate([
                'user_id' => $this->user->id,
                'game_id' => $this->game_selected_id,
            ]);

            $this->dispatchBrowserEvent('alert', ['message' => 'Game added to your wishlist', 'type' => 'success']);
        } else {
            $this->dispatchBrowserEvent('alert', ['message' => 'You already possessed this game', 'type' => 'error']);
        }
    }

    public function removeFromWishedGame()
    {
        $user_wished_game = UserWishedGame::where('user_id', $this->user->id)
            ->where('game_id', $this->game_selected_id)
            ->first();
        $user_wished_game->delete();

        $this->dispatchBrowserEvent('alert', ['message' => 'Game removed from your wishlist', 'type' => 'success']);
    }
}
