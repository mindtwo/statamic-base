@props([
    'content' => null,
    'class' => 'prose',
])

@if($content)
    <div {{ $attributes->merge(['class' => $class]) }}>
        {!! $content !!}
    </div>
@endif
