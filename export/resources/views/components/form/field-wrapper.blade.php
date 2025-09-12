@props(['field' => []])

@php
    $width = $field['width'] ?? 100;
    $gridClasses = match($width) {
        25 => 'col-span-12 md:col-span-3',
        33 => 'col-span-12 md:col-span-4',
        50 => 'col-span-12 md:col-span-6',
        66 => 'col-span-12 md:col-span-8',
        75 => 'col-span-12 md:col-span-9',
        100 => 'col-span-12',
        default => 'col-span-12',
    };
@endphp

<div
    class="{{ $gridClasses }}"
    x-data="{
        fieldError: null,
        updateFieldError() {
            this.fieldError = $data.error ? $data.error['{{ $field['handle'] }}'] : null;
        }
    }"
    x-init="updateFieldError"
    x-effect="updateFieldError"
    {{ $attributes }}
>
    {{ $slot }}
</div>
