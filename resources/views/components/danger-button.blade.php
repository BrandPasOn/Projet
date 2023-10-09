<button style="background-color: #DC2626;" {{ $attributes->merge(['type' => 'submit', 'class' => 'danger-button danger']) }}>
    {{ $slot }}
</button>
