<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{

    public $title, $email, $content;

    public $rules = [
        'email' => 'required|string|max:255',
        'title' => 'required|string|min:5|max:255',
        'content' => 'required|string|min:5|max:500',
    ];
    
    public function render()
    {
        return view('livewire.contact-form');
    }

    public function sendContactForm()
    {
        $validatedData = $this->validate();
        Contact::create($validatedData);

        // Réinitialisez les champs du formulaire
        $this->reset(['email', 'title', 'content']);

        // Réinitialisez également la validation
        $this->resetValidation();

        $this->dispatchBrowserEvent('alert', ['message' => 'Your message has been sent !', 'type' => 'success']);

    }

}

