<button style="background-color: #78dc26;" {{ $attributes->merge(['type' => 'submit', 'class' => 'danger-button danger']) }}>
    {{ $slot }}
</button>
