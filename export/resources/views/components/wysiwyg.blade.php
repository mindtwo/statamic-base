@props([
    'content' => null,
    'class' => 'prose',
])

<div {{ $attributes->merge(['class' => $class]) }}>
    @if(is_array($content))
        @foreach ($content as $bardBlock)
            @if (isset($bardBlock['type']) && $bardBlock['type'] === 'text')
                {!! $bardBlock['text'] !!}
            @elseif(isset($bardBlock['type']) && $bardBlock['type'] === 'button')
                @php
                    $rawLink = $bardBlock['button_link']->value();
                    $buttonLink = $rawLink instanceof \Statamic\Entries\Entry ? $rawLink->url() : $rawLink;
                @endphp

                <x-button :button-label="$bardBlock['button_label']" :button-link="$buttonLink" :style="$bardBlock['button_style']" />
            @endif
        @endforeach
    @else
        {!! $content !!}
    @endif
</div>
