@props(['field'])

@php
    $isRequired = in_array('required', $field['validate'] ?? []);
    $value = old($field['handle'], $field['default'] ?? false);
    $fieldId = $field['id'] ?? $field['handle'];
@endphp

@if(($field['visibility'] ?? 'visible') !== 'hidden')
    <x-form.field-wrapper :field="$field">
        <input type="hidden" name="{{ $field['handle'] }}" value="0">
        <div class="flex gap-4 items-start">
            <input
                type="checkbox"
                id="{{ $fieldId }}"
                name="{{ $field['handle'] }}"
                value="1"
                class="form-checkbox h-6 w-6 p-1 mt-0.5 border-black focus:ring-2 focus:ring-primary-dark focus:ring-offset-2 focus:border-primary-dark"
                :class="{ 'border-red-500': fieldError }"
                {{ $value ? 'checked' : '' }}
                @if($isRequired) required @endif
                @if(!empty($field['readonly'])) readonly @endif
                :aria-invalid="fieldError ? 'true' : 'false'"
                :aria-describedby="fieldError ? '{{ $fieldId }}-error' : '{{ $fieldId }}-instructions'"
            >
            <label for="{{ $fieldId }}" class="block">
                <span class="font-bold {{ isset($field['hide_display']) ? 'sr-only' : '' }}">{{ __($field['display']) }}@if($isRequired)*@endif</span>
                @if(!empty($field['instructions']))
                    <span class="text-current block">
                        {!! $field['instructions'] !!}
                    </span>
                @endif
            </label>
        </div>

        <p
            x-show="fieldError"
            x-text="fieldError"
            x-cloak
            class="text-red-500 mt-1"
            id="{{ $fieldId }}-error"
            role="alert"
        ></p>
    </x-form.field-wrapper>
@endif