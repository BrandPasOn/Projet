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
                <td x-on:click.prevent="$dispatch('open-modal', 'seeContact')" wire:click.prenvent="seeContact({{ $contact->id }})" class="admin-contact-option">See</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="admin-user-paginate">
    {{ $contacts->links() }}
</div>

@if (!is_null($see_contact))
    <div class="see-contact">
        <h3>Title : {{ $see_contact->title }}</h3>

        <p>Content :</p>
        <p>{{ $see_contact->content }}</p>
    </div>
@endif
