@props([
    'style' => 'primary',
    'buttonLabel' => '',
    'buttonLink' => false,
    'class' => 'ml-0 whitespace-nowrap flex-none'
])

@if($buttonLink)
    @php
        $url = is_object($buttonLink) && method_exists($buttonLink, 'url')
            ? $buttonLink->url()
            : $buttonLink;
    @endphp

    <a
        href="{{ $url }}"
        @class([
            $class,
            'btn btn-primary' => $style?->value() === 'primary',
            'btn btn-contrast' => $style?->value() === 'contrast',
            'btn btn-outline' => $style?->value() === 'outline',
            'btn btn-outline-contrast' => $style?->value() === 'outline-contrast',
        ])
    >
        {{ $buttonLabel }}
    </a>
@endif
