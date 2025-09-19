@props(['field'])

@php
    $inputType = $field['input_type'] ?? 'text';
    $isRequired = in_array('required', $field['validate'] ?? []);
    $value = old($field['handle']) ?? $field['default'] ?? '';
    $fieldId = $field['id'] ?? $field['handle'];
@endphp

@if($inputType === 'hidden' && ($field['visibility'] ?? 'visible') !== 'hidden')
    <input type="hidden" name="{{ $field['handle'] }}" value="{!! $value !!}">
@elseif(($field['visibility'] ?? 'visible') !== 'hidden')
    <x-form.field-wrapper :field="$field">
        <label for="{{ $fieldId }}" class="mb-1 font-bold {{ isset($field['hide_display']) ? 'sr-only' : 'block' }}">
            {{ __($field['display']) }}@if($isRequired)*@endif
        </label>

        @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') === 'above')
            <p id="{{ $fieldId }}-instructions-above" class="text-current mb-2">
                {{ $field['instructions'] }}
            </p>
        @endif

        <input
            type="{{ $inputType }}"
            class="form-input w-full px-4 py-3 focus:ring-2 focus:ring-primary-dark focus:ring-offset-2 focus:border-primary-dark placeholder:text-gray-400"
            :class="{ 'border-red-500': fieldError }"
            name="{{ $field['handle'] }}"
            id="{{ $fieldId }}"
            value="{{ $value }}"
            @if(!empty($field['placeholder']))placeholder="{{ __($field['placeholder']) }}@if($isRequired)*@endif"@endif
            @if(!empty($field['autocomplete']))autocomplete="{{ $field['autocomplete'] }}"@endif
            @if($isRequired) required @endif
            @if(!empty($field['readonly'])) readonly @endif
            @if(!empty($field['character_limit']))maxlength="{{ $field['character_limit'] }}"@endif
            :aria-invalid="fieldError ? 'true' : 'false'"
            :aria-describedby="fieldError ? '{{ $fieldId }}-error' : '{{ $fieldId }}-instructions'"
        >

        <p
            x-show="fieldError"
            x-text="fieldError"
            x-cloak
            class="text-red-500 mt-1"
            id="{{ $fieldId }}-error"
            role="alert"
        ></p>

        @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') !== 'above')
            <p id="{{ $fieldId }}-instructions" class="text-current mt-1">
                {{ $field['instructions'] }}
            </p>
        @endif
    </x-form.field-wrapper>
@endif
