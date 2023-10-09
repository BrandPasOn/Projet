<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CommentComponent extends Component
{
    // Comment Form
    public $form_comment;

    // Comment model
    public ?Comment $comment;
    public $is_editable = false;

    // Game_id and User
    public $game_selected_id;
    public $user;

    // list of comments
    public $comments;

    protected $rules = [
        'comment.comment' => 'required|string|max:500',
    ];

    protected $messages = [
        'comment.comment.required' => 'The :attribute cannot be empty.',
        'comment.comment.string' => 'The :attribute format is not valid.',
        'comment.comment.max' => 'The :attribute field cannot exceed 500 characters.',
    ];

    public function mount()
    {
    }

    public function render()
    {
        $this->comments = Comment::where('game_id', $this->game_selected_id)->get();
        
        return view('livewire.comment.show');
    }

    public function addComment()
    {
        $this->validate(
            ['form_comment' => 'required|string|max:500'],
            [
                'form_comment.required' => 'The :attribute cannot be empty.',
                'form_comment.string' => 'The :attribute format is not valid.',
                'form_comment.max' => 'The :attribute field cannot exceed 500 characters.',
            ],
        );

        $comment = new Comment();
        $comment->user_id = $this->user->id;
        $comment->game_id = $this->game_selected_id;
        $comment->comment = $this->form_comment;

        $comment->save();

        $this->comments = Comment::where('game_id', $this->game_selected_id)
            ->where('user_id', $this->user)
            ->get();
        $this->form_comment = null;
    }

    public function editComment($id)
    {
        $comment = Comment::find($id);

        // Vérifie si le commentaire existe et si l'utilisateur connecté est le propriétaire du commentaire
        if ($comment && $comment->user_id === $this->user->id) {
            // L'utilisateur connecté est le propriétaire du commentaire, vous pouvez maintenant autoriser l'édition.
            $this->is_editable = true;
            $this->comment = Comment::find($id);
        } else {
            $this->dispatchBrowserEvent('alert', ['message' => 'You are not authorized to edit this comment !', 'type' => 'error']);

        }
    }

    public function updateComment()
    {
        $this->validate();

        $this->comment->save();

        $this->is_editable = false;
        $this->comment = null;

        $this->dispatchBrowserEvent('alert', ['message' => 'Comment successfully updated.', 'type' => 'success']);
    }

    public function cancelCommentUpdate()
    {
        $this->is_editable = false;
        $this->comment = null;
        $this->resetValidation();
    }
}
