@props(['active'])

@php
$classes = ($active ?? false)
            ? 'responsive-nav-link'
            : 'responsive-nav-link-false';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
