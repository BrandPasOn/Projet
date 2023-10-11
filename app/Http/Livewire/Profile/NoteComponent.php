<?php

namespace App\Http\Livewire\Profile;

use App\Models\UserGame;
use Livewire\Component;
use MarcReichel\IGDBLaravel\Models\Game;

class NoteComponent extends Component
{
    //Game
    public $game_id_selected;
    protected $game;

    //user game
    public $user_game;

    // auth user
    public $user;

    //note form
    public $form_note;

    public function mount()
    {
        $this->user_game = UserGame::where('user_id', $this->user->id)->where('game_id', $this->game_id_selected)->first();
        if($this->user_game->note != null) $this->form_note = $this->user_game->note;
    }
    
    public function render()
    {
        $this->game = Game::where('id', $this->game_id_selected)->first();
        
        return view('livewire.profile.note', ['game' => $this->game]);
    }

    public function addNote($game_id)
    {
        
        $this->validate(
            ['form_note' => 'string|max:500'],
            [
                'form_note.string' => 'The :attribute format is not valid.',
                'form_note.max' => 'The :attribute field cannot exceed 500 characters.',
            ],
        );

        if($game_id === $this->game_id_selected){
            $this->user_game->note = strip_tags($this->form_note);
            $this->user_game->save();
        }

    }

    public function submitForm($game_id)
    {
        $this->addNote($game_id);
    }
}
