<x-mail::message>
# {{ __('New contact request received') }}

@if($form_subject)
**{{ __('What is this about?') }}:** {{ __($form_subject) }}
@endif

@if($form_salutation)
**{{ __('Salutation') }}:** {{ __($form_salutation) }}<br>
@endif
@if($form_company)
**{{ __('Company') }}:** {{ $form_company }}<br>
@endif
@if($form_name)
**{{ __('First Name') }}:** {{ $form_name }}<br>
@endif
@if($form_surname)
**{{ __('Last Name') }}:** {{ $form_surname }}<br>
@endif
@if($form_email)
**{{ __('Email') }}:** {{ $form_email }}<br>
@endif
@if($form_phone)
**{{ __('Phone') }}:** {{ $form_phone }}<br>
@endif
@if($form_street)
**{{ __('Street, House No.') }}:** {{ $form_street }}<br>
@endif
@if($form_zip)
**{{ __('ZIP Code') }}:** {{ $form_zip }}<br>
@endif
@if($form_city)
**{{ __('City') }}:** {{ $form_city }}<br>
@endif

@if($form_message)
**{{ __('Message') }}:**

{{ $form_message }}
@endif

@if($form_privacy)
**{{ __('Privacy') }}:** ✓
@endif

---

Diese E-Mail wurde über das Kontaktformular auf {{ config('app.url') }} gesendet.
</x-mail::message>
