@props(['field'])

@php
    $isRequired = in_array('required', $field['validate'] ?? []);
    $value = old($field['handle']) ?? $field['default'] ?? '';
    $fieldId = $field['id'] ?? $field['handle'];
    $rows = $field['rows'] ?? 4;
@endphp

@if(($field['visibility'] ?? 'visible') !== 'hidden')
    <x-form.field-wrapper :field="$field">
        <label for="{{ $fieldId }}" class="mb-1 {{ isset($field['hide_display']) ? 'sr-only' : 'block' }}">
            {{ __($field['display']) }}@if($isRequired)*@endif
        </label>

        @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') === 'above')
            <p class="text-sm text-current mb-1">
                {{ $field['instructions'] }}
            </p>
        @endif

        <textarea
            class="form-textarea w-full focus:ring-2 focus:ring-primary-dark focus:ring-offset-2 focus:border-primary-dark placeholder:text-gray-400"
            :class="{ 'border-red-500': fieldError }"
            name="{{ $field['handle'] }}"
            id="{{ $fieldId }}"
            rows="{{ $rows }}"
            @if(!empty($field['placeholder']))placeholder="{{ __($field['placeholder']) }}@if($isRequired)*@endif"@endif
            @if($isRequired) required @endif
            @if(!empty($field['readonly'])) readonly @endif
            @if(!empty($field['character_limit']))maxlength="{{ $field['character_limit'] }}"@endif
            :aria-invalid="fieldError ? 'true' : 'false'"
            :aria-describedby="fieldError ? '{{ $fieldId }}-error' : '{{ $fieldId }}-instructions'"
        >{{ $value }}</textarea>

        <p
            x-show="fieldError"
            x-text="fieldError"
            x-cloak
            class="text-red-500 text-sm mt-1"
            id="{{ $fieldId }}-error"
            role="alert"
        ></p>

        @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') !== 'above')
            <p class="text-sm text-current mt-1">
                {{ $field['instructions'] }}
            </p>
        @endif
    </x-form.field-wrapper>
@endif
