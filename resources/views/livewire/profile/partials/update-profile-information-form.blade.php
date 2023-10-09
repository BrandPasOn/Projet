<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>


    <form wire:submit.prevent="update" class="mt-6 space-y-6">
        {{-- @csrf --}}


        <div>
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" wire:model="user.name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('user.name')" />
        </div>

        <div>
            <x-input-label for="update-info-email" :value="__('Email')" />
            <x-text-input id="update-info-email" wire:model="user.email" name="email" type="user.email" :value="old('email', $user->email)" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
