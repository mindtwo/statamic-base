@props(['field'])

@php
    $isRequired = in_array('required', $field['validate'] ?? []);
    $value = old($field['handle'], $field['default'] ?? '');
    $fieldId = $field['id'] ?? $field['handle'];
    $isInline = !empty($field['inline']);
@endphp

@if(($field['visibility'] ?? 'visible') !== 'hidden')
    <x-form.field-wrapper :field="$field">
        <fieldset>
            <legend class="mb-2 font-bold {{ isset($field['hide_display']) ? 'sr-only' : 'block' }}">
                {{ __($field['display']) }}@if($isRequired)*@endif
            </legend>

            @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') === 'above')
                <p class="text-current mb-1">
                    {{ $field['instructions'] }}
                </p>
            @endif

            <div
                class="{{ $isInline ? 'flex flex-wrap gap-4' : 'space-y-2' }}"
                role="radiogroup"
                aria-labelledby="{{ $fieldId }}-legend"
                :aria-invalid="fieldError ? 'true' : 'false'"
                :aria-describedby="fieldError ? '{{ $fieldId }}-error' : '{{ $fieldId }}-instructions'"
            >
                @foreach($field['options'] ?? [] as $optionValue => $label)
                    <div class="flex gap-4 items-center">
                        <input
                            type="radio"
                            id="{{ $fieldId }}_{{ $loop->index }}"
                            name="{{ $field['handle'] }}"
                            value="{{ $optionValue }}"
                            class="form-radio h-6 w-6 p-1 mt-0.5 border-black focus:ring-2 focus:ring-primary-dark focus:ring-offset-2 focus:border-primary-dark"
                            :class="{ 'border-red-500': fieldError }"
                            {{ $value == $optionValue ? 'checked' : '' }}
                            @if($isRequired) required @endif
                            @if(!empty($field['readonly'])) readonly @endif
                            :aria-invalid="fieldError ? 'true' : 'false'"
                            :aria-describedby="fieldError ? '{{ $fieldId }}-error' : '{{ $fieldId }}-instructions'"
                        >
                        <label for="{{ $fieldId }}_{{ $loop->index }}">
                            {{ __($label) }}
                        </label>
                    </div>
                @endforeach
            </div>

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
        </fieldset>
    </x-form.field-wrapper>
@endif