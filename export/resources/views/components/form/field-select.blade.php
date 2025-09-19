@props(['field'])

@php
    $isRequired = in_array('required', $field['validate'] ?? []);
    $value = old($field['handle']) ?? $field['default'] ?? '';
    $fieldId = $field['id'] ?? $field['handle'];
@endphp

@if(($field['visibility'] ?? 'visible') !== 'hidden')
    <x-form.field-wrapper :field="$field">
        <label for="{{ $fieldId }}" class="mb-1 font-bold {{ isset($field['hide_display']) ? 'sr-only' : 'block' }}">
            {{ __($field['display']) }}@if($isRequired)*@endif
        </label>

        @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') === 'above')
            <p class="text-current mb-1">
                {{ $field['instructions'] }}
            </p>
        @endif

        <select
            class="form-select w-full px-4 py-3 focus:ring-2 focus:ring-primary-dark focus:ring-offset-2 focus:border-primary-dark"
            :class="{ 'border-red-500': fieldError }"
            name="{{ $field['handle'] }}"
            id="{{ $fieldId }}"
            @if($isRequired) required @endif
            @if(!empty($field['readonly'])) readonly @endif
            :aria-invalid="fieldError ? 'true' : 'false'"
            :aria-describedby="fieldError ? '{{ $fieldId }}-error' : '{{ $fieldId }}-instructions'"
        >
            @if(!empty($field['placeholder']))
                <option value="" selected disabled>{{ __($field['placeholder']) }}@if($isRequired)*@endif</option>
            @endif

            @foreach($field['options'] ?? [] as $option)
                @if(is_array($option))
                    <option
                        value="{{ $option['key'] ?? $option['value'] ?? '' }}"
                        {{ $value == ($option['key'] ?? $option['value'] ?? '') ? 'selected' : '' }}
                    >
                        {{ __($option['value'] ?? $option['label'] ?? '') }}
                    </option>
                @else
                    <option
                        value="{{ $option }}"
                        {{ $value == $option ? 'selected' : '' }}
                    >
                        {{ __($option) }}
                    </option>
                @endif
            @endforeach
        </select>

        <p
            x-show="fieldError"
            x-text="fieldError"
            x-cloak
            class="text-red-500 mt-1"
            id="{{ $fieldId }}-error"
            role="alert"
        ></p>

        @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') !== 'above')
            <p class="text-current mt-1">
                {{ $field['instructions'] }}
            </p>
        @endif
    </x-form.field-wrapper>
@endif
