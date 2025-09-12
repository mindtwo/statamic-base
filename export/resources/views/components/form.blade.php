@props([
    'handle',
    'successMessage' => trans('form.success'),
])

@php
    $form = Statamic::tag('form:' . $handle)->fetch();
@endphp

<div x-data="{ submitting: false, success: false, errors: [], error: null }" x-form x-cloak>
    <div x-show="errors.length > 0" x-cloak class="bg-red-300 rounded-sm p-8 mb-8 wysiwyg">
        <p class="h5 text-red-900 leading-tight font-bold">{{ trans('form.error') }}</p>
        <ul>
            <template x-for="error in errors" :key="error">
                <li x-text="error"></li>
            </template>
        </ul>
    </div>

    <div x-show="success" x-cloak class="flex items-center gap-x-8 bg-primary/50 rounded-sm p-8 mb-8">
        <p class="h5 text-primary-dark leading-tight font-bold">
            {{ $successMessage }}
        </p>
    </div>

    <div x-show="!success" x-cloak>
        <p class="text-xs text-right mb-4">{{ trans('form.required_fields') }}</p>

        <form action="{{ $form['attrs']['action'] }}" method="POST">
            @csrf

            @foreach($form['sections'] as $section)
                <div>
                    <fieldset>
                        @if($section['display'])
                            <legend class="text-fluid-h4 font-heading font-medium mb-4">
                                {{ __($section['display']) }}
                            </legend>
                        @endif

                        @if($section['instructions'])
                            <p class="text-fluid-base text-secondary mb-6">
                                {{ $section['instructions'] }}
                            </p>
                        @endif

                        <div class="grid grid-cols-12 gap-8 h-full">
                            @foreach($section['fields'] as $field)
                                <x-dynamic-component
                                    :component="'form.field-' . $field['type']"
                                    :field="$field"
                                />
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            @endforeach

            <div>
                <input type="text" class="hidden" name="{{$form['honeypot'] ?? 'honeypot'}}" />

                {{ $slot ?? '' }}

                {{-- Uncomment below if CAPTCHA module is enabled --}}
                {{-- 
                <div class="mt-8">
                    {!! Statamic::tag('captcha') !!}

                    @if ($errors->has('captcha'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('captcha') }}</p>
                    @endif
                </div>

                @push('scripts')
                    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
                @endpush
                --}}

                <div class="mt-8">
                    <button type="submit" class="flex" :disabled="submitting">
                        <span class="btn btn-primary btn-primary-contrast">
                            <span x-text="submitting ? '{{ trans('form.is_sending') }}' : '{{ trans('form.submit') }}'"></span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
