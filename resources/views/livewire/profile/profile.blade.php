<div class="profile">
    <x-slot name="header">
        <h2 class="profile-title">
            {{ __('Profile Information') }}
        </h2>
    </x-slot>

    <div class="profile-content">
        <div>
            <div class="profile-view">
                <div>
                    @include('livewire.profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="profile-view">
                <div>
                    @include('livewire.profile.partials.update-password-form')
                </div>
            </div>

            <div class="profile-view">
                <div>
                    @include('livewire.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
