<div id="note">
    <label for="form_note">Add some notes :</label>
    <textarea wire:model="form_note" wire:change="addNote({{ $game->id }})" name="form_note" id="form_note"
        @if (is_null($game->note)) placeholder="Add note" @endif></textarea>
    @error('form_note')
        <span class="text-danger error">{{ $message }}</span>
    @enderror
</div>
