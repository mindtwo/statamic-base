@props([
    'class' => '',
    'outerGridClasses' => 'grid grid-cols-12',
    'innerGridClasses' => 'col-span-10 col-start-2',
])

<div {{ $attributes->merge(['class' => $outerGridClasses . ' ' . $class]) }}>
    <div class="{{ $innerGridClasses }}">
        {{ $slot }}
    </div>
</div>
