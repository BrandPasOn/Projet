<?php

namespace App\Http\Livewire;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterComponent extends Component
{
    public $email;

    public $rules = [
        'email' => 'required|string|max:255',
    ];

    public function render()
    {
        return view('livewire.newsletter');
    }

    public function addToNewsletter()
    {
        $validatedData = $this->validate();

        $verify = Newsletter::where('email', $this->email)->first();
        
        if (!isset($verify)) {
            Newsletter::Create($validatedData);

            // reset form input
            $this->reset(['email']);

            $this->dispatchBrowserEvent('alert', ['message' => 'You have been added to the newsletter', 'type' => 'success']);
        } else {
            // reset form input
            $this->reset(['email']);

            $this->dispatchBrowserEvent('alert', ['message' => 'You are already in ou record', 'type' => 'error']);
        }
    }
}
