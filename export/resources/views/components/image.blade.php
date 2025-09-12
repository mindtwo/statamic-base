@props([
    'assets' => null,
    'alt' => isset($image['alt']) ? $image['alt']->value() : '',
    'class' => '',
    'loading' => false,
    'simpleMarkup' => false
])

@if($simpleMarkup)
    @foreach($assets as $image)
        <img src="{{ $image['url'] }}"
             alt="{{ $alt }}"
             width="{{ $image['width'] ?? '' }}"
             height="{{ $image['height'] ?? '' }}"
             loading="{{ $loading ? 'lazy' : 'eager' }}"
             class="{{ $class }}">
    @endforeach
@else
    <figure>
        @foreach($assets as $image)
            <div class="relative">
                <picture>
                    <img src="{{ $image['url'] }}"
                         alt="{{ $alt }}"
                         width="{{ $image['width'] ?? '' }}"
                         height="{{ $image['height'] ?? '' }}"
                         loading="{{ $loading ? 'lazy' : 'eager' }}"
                         class="{{ $class }}">
                </picture>

                @if(isset($image['caption']) ? $image['caption']->value() : false)
                    <figcaption class="absolute max-w-[80%] right-8 bottom-4 bg-black/40 py-2 px-4 rounded-sm text-white">{{ $image['caption'] }}</figcaption>
                @endif
            </div>
        @endforeach
    </figure>
@endif
