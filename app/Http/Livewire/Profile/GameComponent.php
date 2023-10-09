<?php

namespace App\Http\Livewire\Profile;

use App\Models\UserGame;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;

class GameComponent extends Component
{
    //user
    public $user;

    public $game_id;
    public $game_id_selected;
    public $is_selected_game;
    public $verifyIsFav;

    protected $game;

    public function mount()
    {
        $this->user = Auth::user();

        if ($this->game_id_selected != $this->game_id) {
            $this->game_id_selected = $this->game_id;
            $this->loadGame();
        }

        $isFav = UserGame::select('is_favorite')
            ->where('game_id', $this->game_id_selected)
            ->first();
        $this->verifyIsFav = $isFav->is_favorite;
    }

    public function render()
    {
        if ($this->game_id_selected != $this->game_id) {
            $this->game_id_selected = $this->game_id;
            $this->loadGame();
        }

        return view('livewire.profile.show-game', ['game' => $this->game]);
    }

    public function loadGame()
    {
        $this->game = Game::where('id', $this->game_id_selected)
            ->with(['genres' => ['*'], 'cover' => ['*']])
            ->first();
    }

    public function addToFav($game_id)
    {
        $verify = UserGame::where('game_id', $game_id)
            ->where('user_id', $this->user->id)
            ->first();

        if (is_null($verify)) {
            $this->dispatchBrowserEvent('alert', ['message' => 'You can\'t add this game to your fav', 'type' => 'error']);
        } else {
            $verify->is_favorite = !$verify->is_favorite;
            $verify->save();

            $this->loadGame();

            if ($verify->is_favorite === false) {
                $this->dispatchBrowserEvent('alert', ['message' => $this->game->name . ' has been remove from your fav', 'type' => 'success']);
            } else {
                $this->dispatchBrowserEvent('alert', ['message' => $this->game->name . ' has been added to your fav', 'type' => 'success']);
            }
            return redirect()->route('profile.library');
        }
    }
}
