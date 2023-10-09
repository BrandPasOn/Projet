<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsernameComponent extends Component
{
    public $username;


    public function render()
    {
        $this->username = Auth::user()->name;

        return view('livewire.username');
    }
}
