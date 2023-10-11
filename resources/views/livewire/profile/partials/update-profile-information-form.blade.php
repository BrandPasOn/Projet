<section id="update-profile-info">
    <header>
        <h2>Profile Information</h2>

        <p>Update your account's profile information and email address.</p>
    </header>


    <form wire:submit.prevent="update">
        <div class="update-info-name">
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" wire:model="user.name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="profile-error" :messages="$errors->get('user.name')" />
        </div>

        <div class="update-info-email">
            <x-input-label for="update-info-email" :value="__('Email')" />
            <x-text-input id="update-info-email" wire:model="user.email" name="email" type="user.email" :value="old('email', $user->email)" />
        </div>

        <div class="update-info-submit">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
