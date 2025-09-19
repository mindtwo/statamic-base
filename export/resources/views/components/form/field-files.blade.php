@props(['field'])

@php
    $isRequired = in_array('required', $field['validate'] ?? []);
    $fieldId = $field['id'] ?? $field['handle'];
    $placeholder = $field['placeholder'] ?? $field['display'] ?? '';
    $maxFiles = $field['max_files'] ?? 1;

    // Extract file validation info
    $maxFilesize = null;
    $allowedMimes = [];

    foreach ($field['validate'] ?? [] as $rule) {
        if (str_starts_with($rule, 'max_filesize:')) {
            $maxFilesize = str_replace('max_filesize:', '', $rule);
        }
        if (str_starts_with($rule, 'mimes:')) {
            $allowedMimes = explode(',', str_replace('mimes:', '', $rule));
        }
    }

    $accept = !empty($allowedMimes) ? '.' . implode(',.', $allowedMimes) : '';
@endphp

@if(($field['visibility'] ?? 'visible') !== 'hidden')
<div
    @class([
        'col-span-2' => ($field['width'] ?? 100) == 100,
        'col-span-2 md:col-span-1' => ($field['width'] ?? 100) == 50,
    ])
    x-data="{
        fieldError: null,
        updateFieldError() {
            this.fieldError = $data.error ? $data.error['{{ $field['handle'] }}'] : null;
        }
    }"
    x-init="updateFieldError"
    x-effect="updateFieldError"
>
    <label for="{{ $fieldId }}" class="mb-1 block">
        {{ __($field['display']) ?? '' }}@if($isRequired)*@endif
    </label>

    @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') === 'above')
        <p class="text-current mb-2">{{ $field['instructions'] }}</p>
    @endif

    <input
        type="file"
        class="w-full file:mr-4 file:py-2 file:px-4 file:rounded-xs file:border-0 file:bg-secondary  hover:file:bg-primary hover:file:text-white"
        :class="{ 'border-red-500': fieldError }"
        name="{{ $field['handle'] }}{{ $maxFiles > 1 ? '[]' : '' }}"
        id="{{ $fieldId }}"
        @if($isRequired) required @endif
        @if($maxFiles > 1) multiple @endif
        @if($accept) accept="{{ $accept }}" @endif
        :aria-invalid="fieldError ? 'true' : 'false'"
        :aria-describedby="fieldError ? '{{ $fieldId }}-error' : '{{ $fieldId }}-instructions'"
    >

    @php
        $rules = collect([
            $maxFiles > 1 ? trans('base.max_files', ['count' => $maxFiles]) : null,
            $maxFilesize ? trans('base.max', ['size' => number_format($maxFilesize / 1024, 0)]) : null,
        ])->filter()->implode(', ');
    @endphp

    @if($rules)
        <p class="text-current mt-1">{{ $rules }}</p>
    @endif

    <p x-show="fieldError" x-text="fieldError" x-cloak class="text-red-500 mt-1" id="{{ $fieldId }}-error" role="alert"></p>

    @if(!empty($field['instructions']) && ($field['instructions_position'] ?? 'below') !== 'above')
        <p id="{{ $fieldId }}-instructions" class="text-current mt-1">{{ $field['instructions'] }}</p>
    @endif
</div>
@endif
