<table class="admin-users-list">
    <tbody>
        <tr>
            <td class="admin-user-id">Id</td>
            <td class="admin-user-name">Username</td>
            <td class="admin-user-email">Email</td>
            <td class="admin-user-role">Role</td>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td class="admin-user-id">{{ $user->id }}</td>
                <td class="admin-user-name">{{ $user->name }}</td>
                <td class="admin-user-email">{{ $user->email, 5 }}</td>
                <td x-on:click.prevent="$dispatch('open-modal', 'comfirmRole')"
                    wire:click.prevent="prepareChangeUserRole({{ $user->id }})" class="admin-user-role">
                    {{ $user->role === 1 ? 'User' : 'Admin' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="admin-user-paginate">
    {{ $users->links() }}
</div>


<x-modal name="comfirmRole">
    <div wire:loading>
        Loading ...
    </div>
    <div wire:loading.remove class="">
        <p>Are you sure you want to change his role ?</p>

        <x-danger-button x-on:click="$dispatch('close')">{{ __('No') }}</x-danger-button>
        <x-validation-button wire:click.prevent="changeUserRole({{ $user_role_change_id }})"
            x-on:click="$dispatch('close')">{{ __('yes') }}</x-validation-button>
    </div>
</x-modal>
