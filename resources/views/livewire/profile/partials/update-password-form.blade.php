<section id="update-password">
    <header>
        <h2>Update Password</h2>

        <p>Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form wire:submit.prevent="updatePassword">

        <div class="update-password-inputs">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input wire:model.defer="current_password" id="current_password" name="current_password" type="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="profile-error" />
        </div>

        <div class="update-password-inputs">
            <x-input-label for="password-update" :value="__('New Password')" />
            <x-text-input wire:model.defer="new_password" id="password-update" name="password" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('new_password')" class="profile-error" />
        </div>

        <div class="update-password-inputs">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model.defer="confirm_password" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('confirm_password')" class="profile-error" />
        </div>

        <div class="update-password-submit">
            <x-primary-button>Save</x-primary-button>
        </div>
    </form>
</section>
