<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileComponent extends Component
{
    public User $user;

    public $oldUser;

    // delete user
    public $password;

    //update password
    public $current_password;
    public $new_password;
    public $confirm_password;


    public function rules()
    {
        return [
            'user.name' => 'required|string|max:255|min:3',
            'user.email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user->id)],
        ];
    }

    public function mount()
    {
        $this->oldUser = $this->user->name;
        // dd($this->oldUser);
    }

    public function render()
    {
        return view('livewire.profile.profile');
    }

    public function update()
    {
        $validatedData = $this->validate();
        
        if($validatedData['user']['name'] != $this->oldUser){
            
            $this->user->fill($validatedData);
    
            $this->user->save();

            $this->oldUser = $validatedData['user']['name'];
    
            $this->dispatchBrowserEvent('alert', ['message' => 'Your profile information has been updated', 'type' => 'success']);
    
            $this->dispatchBrowserEvent('username', ['username' => $validatedData['user']['name']]);
        } else {
            $this->resetValidation();
        }
        

    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|current_password',
            'new_password' => ['required', 'same:confirm_password', Rules\Password::defaults()],
        ]);

        // verify the mdp
        if (Hash::check($this->current_password, Auth::user()->password) === false) {
            $this->dispatchBrowserEvent('alert', ['message' => 'The current password is incorrect.', 'type' => 'error']);
            return;
        }
        
        // update with new mdp
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->dispatchBrowserEvent('alert', ['message' => 'Your password as been update', 'type' => 'success']);
        $this->reset(['current_password', 'new_password', 'confirm_password']);
        $this->resetValidation();
    }

    public function destroy()
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        $user = Auth::user();

        Auth::logout();

        $user->delete();
        
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->to('/');
    }

}
