<table class="admin-contact-list">
    <tbody>
        <tr>
            <td class="admin-contact-id">Id</td>
            <td class="admin-contact-email">Email</td>
            <td class="admin-contact-title">Title</td>
            <td class="admin-contact-option">Option</td>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td class="admin-contact-id">{{ $contact->id }}</td>
                <td class="admin-contact-email">{{ $contact->email, 5 }}</td>
                <td class="admin-contact-title">{{ $contact->title, 5 }}</td>
                <td wire:click.prenvent="seeContact({{ $contact->id }})" x-on:click.prevent="$dispatch('open-modal', 'seeContact')" class="admin-contact-option">See</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="admin-user-paginate">
    {{ $contacts->links() }}
</div>

@if (!is_null($see_contact))
    <x-modal name="seeContact">
        <div wire:loading>
            Loading ...
        </div>
        <div wire:loading.remove>
            <h3>{{ $see_contact->title }}</h3>
            <p>{{ $see_contact->content }}</p>

            <x-validation-button x-on:click="$dispatch('close')">{{ __('Close') }}</x-validation-button>
        </div>
    </x-modal>
@endif
