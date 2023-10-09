@props(['align' => 'right', 'width' => '12', 'contentClasses' => 'dropdown-content'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'dropdown-alignment-classes-left';
        break;
    case 'top':
        $alignmentClasses = 'dropdown-alignment-classes-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'dropdown-alignment-classes';
        break;
}

switch ($width) {
    case '12':
        $width = 'dropdown-default-width';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="dropdown-transition-enter"
            x-transition:enter-start="dropdown-transition-enter-start"
            x-transition:enter-end="dropdown-transition-enter-end"
            x-transition:leave="dropdown-transition-leave"
            x-transition:leave-start="dropdown-transition-leave-start"
            x-transition:leave-end="dropdown-transition-leave-end"
            class="dropdown-component {{ $width }} {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="{{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
