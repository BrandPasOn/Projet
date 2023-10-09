<section class="main-admin">
    <aside class="admin-nav">
        <select id="admin-nav-mobile" name="admin-nav" wire:model="admin_nav">
            <option selected value="dashboard">Dashboard</option>
            <option value="users-list">Users List</option>
            <option value="contact">Contact List</option>
        </select>

        <ul class="admin-nav-desktop">
            <li wire:click.prevent="setAdminNav('dashboard')">Dashboard</li>
            <li wire:click.prevent="setAdminNav('users-list')">Users List</li>
            <li wire:click.prevent="setAdminNav('contact-list')">Contact List</li>
        </ul>
    </aside>


    <section class="admin-view">
        <div wire:loading>
            Loading ...
        </div>
        <div wire:loading.remove>
            @include('livewire.admin.page.' . $admin_nav)
        </div>

    </section>
</section>
