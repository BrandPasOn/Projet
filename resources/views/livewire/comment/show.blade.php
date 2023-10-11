<div class="comment">
    <h2>Comment section :</h2>
    @if (session('error'))
        <div style="background-color: red" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="addComment">
        <label for="form_comment">Comment</label>
        <x-textarea-input id="form_comment" wire:model="form_comment" name="form_comment" class="auth-input" required />
        @error('form_comment')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
        <button type="submit">{{ __('Add Comment') }}</button>
    </form>
    <div class="comment-list">
        @foreach ($comments as $c)
            <div class="comment-card">
                <h4>{{ $c->created_at->formatLocalized(env('DATE_FORMAT')) }} - {{ $c->user->name }}</h4>
                @if ($is_editable && $comment->id === $c->id)
                    <form wire:submit.prevent="updateComment">
                        <label style="display: none" for="comment-form">Comment</label>
                        <x-textarea-input wire:model="comment.comment" name="form_comment" id="comment-form"
                            class="auth-input" />
                        @error('comment.comment')
                            <span class="comment-error">{{ $message }}</span>
                        @enderror
                        <div class="edit-comment">
                            <button class="edit-comment-button-send" type="submit">{{ __('Edit Comment') }}</button>
                            <button class="edit-comment-button-cancel" type="submit"
                                wire:click.prevent="cancelCommentUpdate">{{ __('Cancel Edit') }}</button>
                        </div>
                    </form>
                @else
                    <p>{{ $c->comment }}</p>
                    @if ((Auth::user() && $c->user_id === Auth::user()->id) || (Auth::user() && Auth::user()->role === 2))
                        <div class="edit-comment">
                            @if ($is_deleteable && $comment->id === $c->id)
                                <button class="delete-comment-button-send" wire:click.prevent="comfirmDeleteComment({{ $c->id }})">Comfirm Delete</button>
                            @else
                                <button class="delete-comment-button-send" wire:click.prevent="deleteComment({{ $c->id }})">Delete</button>
                            @endif
                            <button class="edit-comment-button-send"
                                wire:click.prevent="editComment({{ $c->id }})">Edit</button>
                        </div>
                    @endif
                @endif

            </div>
        @endforeach
    </div>
    @if ($is_deleteable)
        <x-modal name="deleteComment">

            <div>


                <x-validation-button x-on:click="$dispatch('close')">{{ __('Close') }}</x-validation-button>
            </div>
        </x-modal>
    @endif

</div>
