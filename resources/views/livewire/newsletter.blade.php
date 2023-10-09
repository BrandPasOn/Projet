<div class="newsletter">
    <form wire:submit.prevent="addToNewsletter">
        <div>
            <!-- Email  -->
            <x-input-label for="email" class="newsletter-label" :value="__('Subscribe to newsletter :')" />
            <x-text-input wire:model.lazy="email" id="email" class="auth-input" type="email" name="email" required />
            <x-input-error :messages="$errors->get('email')" />
        </div>
        <button class="newsletter-button" type="submit">{{ __('Subscribe Now') }}</button>
    </form>
</div>
