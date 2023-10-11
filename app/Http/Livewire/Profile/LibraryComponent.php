<?php

namespace App\Http\Livewire\Profile;

use App\Models\UserGame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use MarcReichel\IGDBLaravel\Enums\Image\Size;
use MarcReichel\IGDBLaravel\Models\Game;

class LibraryComponent extends Component
{
    // selected game
    protected $game;
    public $game_id;
    public $game_id_selected;
    public $is_selected_game = false;
    public $test;

    // Auth user
    public $user;

    // list of games
    public $games;
    public $favorite_games;

    // list of ids of user_games
    public $user_games;
    public $user_games_id = [];

    //list of ids of favorite user_games
    public $user_favorite_games;
    public $user_favorite_games_id = [];

    public $selectedGame;


    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $this->getLibraryGames();

        return view('livewire.profile.library');
    }

    public function getLibraryGames()
    {
        $this->user_favorite_games_id = [];
        $this->user_games_id = [];
        
        $this->user_games = UserGame::select('game_id')
            ->where('user_id', $this->user->id)
            ->where('is_favorite', false)
            ->get();

        foreach ($this->user_games as $game) {
            $this->user_games_id[] = $game->game_id;
        }
        if (!empty($this->user_games_id)) {
            $this->games = Game::whereIn('id', $this->user_games_id)
                ->with(['themes' => ['*'], 'cover' => ['*']])
                ->orderBy('name')
                ->get();
        }

        $this->user_favorite_games = UserGame::select('game_id')
            ->where('user_id', $this->user->id)
            ->where('is_favorite', true)
            ->get();

        foreach ($this->user_favorite_games as $game) {
            $this->user_favorite_games_id[] = $game->game_id;
        }

        if (!empty($this->user_favorite_games_id)) {
            $this->favorite_games = Game::whereIn('id', $this->user_favorite_games_id)
                ->with(['themes' => ['*'], 'cover' => ['*']])
                ->orderBy('name')
                ->get();
        }
    }

    public function showGame($game_id)
    {
        $verify_user_game = UserGame::select('game_id')
            ->where('game_id', $game_id)
            ->where('user_id', $this->user->id)
            ->first();

        if (!is_null($verify_user_game)) {
            $this->is_selected_game = true;
            $this->game_id_selected = $game_id;
        } else {
            $this->dispatchBrowserEvent('alert', ['message' => 'An error occurred while processing your request. Please try again later or contact support for assistance.', 'type' => 'error']);
        }
    }

    public function showSelectGame()
    {
        $this->showGame(intval($this->selectedGame));
    }

    protected $listeners = ['loadLibraryGames' ];

    public function loadLibraryGames()
    {
        
        
        $this->getLibraryGames();
    }

}
