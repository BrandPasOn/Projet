<section id="delete-user">
    <header>
        <h2>Delete Account</h2>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Delete Account</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form wire:submit.prevent="destroy">

            <h2>Are you sure you want to delete your account?</h2>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input wire:model="password" id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="Password"/>

                <x-input-error :messages="$errors->get('password')" class="profile-error" />
            </div>

            <div>
                <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>

                <x-danger-button>Delete Account</x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
