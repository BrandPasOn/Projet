@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link'
            : 'nav-link-false';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
