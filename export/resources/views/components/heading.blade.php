@props([
    'element' => 'h2',
    'heading' => null,
    'class' => '',
    'overline' => null,
    'overlineClass' => 'block',
])

@if($heading || $overline)
    <{{ $element }} class="{{ $class }}">
        @if($overline)
            <span class="{{ $overlineClass }}">{{ $overline }}</span>
        @endif
        {{ $heading }}
    </{{ $element }}>
@endif
