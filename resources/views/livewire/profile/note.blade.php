<div>
    <form wire:submit.prevent="addNote">
        <label for="form_note">note</label>
        <textarea wire:model="form_note" wire:blur="submitForm({{ $game->id }})" type="textarea" name="form_note" id="note-form" @if (is_null($game->note)) placeholder="Add note" @endif></textarea>
        @error('form_note')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
    </form>
</div>
