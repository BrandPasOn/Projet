<div class="contact-page">
    <form wire:submit.prevent="sendContactForm">
        <div class="contact-info">
            <div class="contact-object">
                <!-- Object  -->
                <x-input-label for="title" :value="__('Object')" />
                <x-text-input wire:model.lazy="title" id="title" class="auth-input" type="text" name="title" required />
                <x-input-error :messages="$errors->get('title')" class="contact-error" />
            </div>
            <div class="contact-email">
                <!-- Email Address -->
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model.lazy="email" id="email" class="auth-input" type="email" name="email" required />
                <x-input-error :messages="$errors->get('email')" class="contact-error" />
            </div>
        </div>
        <div class="contact-content">
            <!-- Content  -->
            <x-input-label for="content" :value="__('Object')" />
            <x-textarea-input wire:model.lazy="content" id="content" class="auth-input" name="content" required />
            <x-input-error :messages="$errors->get('content')" class="contact-error" />
        </div>

        <button class="contact-submit" type="submit">{{ __('Send') }}</button>

    </form>
</div>
