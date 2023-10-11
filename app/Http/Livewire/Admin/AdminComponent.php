<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AdminComponent extends Component
{
    use WithPagination;

    public $admin_nav;

    // dashboard
    public $newUser;
    public $newComment;
    public $newContact;
    public $newNewsletter;
    public $selectDays = 30;

    // user list
    public $user_role_change_id;
    public $user_role_change;

    protected $users;
    protected $contacts;

    public $see_contact = null;

    public function mount()
    {
        $this->admin_nav = 'dashboard';
    }

    public function render()
    {
        switch ($this->admin_nav) {
            case 'users-list':
                $this->users = User::where('id', '<>', Auth::user()->id)->paginate(10);
                break;
            case 'contact-list':
                $this->contacts = Contact::paginate(10);
                break;
            default:
                if (in_array($this->selectDays, [30, 14, 7])) {
                    $this->newUser = User::whereDate('created_at', '>=', Carbon::now()->subDays($this->selectDays))->count();
                    $this->newComment = Comment::whereDate('created_at', '>=', Carbon::now()->subDays($this->selectDays))->count();
                    $this->newContact = Contact::whereDate('created_at', '>=', Carbon::now()->subDays($this->selectDays))->count();
                    $this->newNewsletter = Newsletter::whereDate('created_at', '>=', Carbon::now()->subDays($this->selectDays))->count();
                }
                break;
        }
        return view('livewire.admin.show', ['users' => $this->users, 'contacts' => $this->contacts]);
    }

    public function setAdminNav($tab)
    {
        $this->see_contact = null;
        $this->admin_nav = $tab;
        // reset paginate
        $this->resetPage();
    }

    public function changeUserRole($user_id)
    {
        $user = User::find($user_id);

        switch ($user->role) {
            case 1:
                $user->role = 2;
                $user->save();
                $this->dispatchBrowserEvent('alert', ['message' => 'Role as been update', 'type' => 'success']);
                break;
            case 2:
                $user->role = 1;
                $user->save();
                $this->dispatchBrowserEvent('alert', ['message' => 'Role as been update', 'type' => 'success']);
                break;
        }
    }

    public function prepareChangeUserRole($user_id)
    {
        $this->user_role_change_id = $user_id;
        $this->user_role_change = User::find($user_id);
    }

    public function seeContact($contact_id)
    {
        $this->see_contact = Contact::find($contact_id);

        $this->see_contact->read = true;
        $this->see_contact->save();
    }
}
