<x-mail::message>
# {{ __('New contact request received') }}

@if($salutation)
**{{ __('Salutation') }}:** {{ __($salutation->raw()) }}<br>
@endif
@if($company)
**{{ __('Company') }}:** {{ $company }}<br>
@endif
@if($first_name)
**{{ __('First Name') }}:** {{ $first_name }}<br>
@endif
@if($last_name)
**{{ __('Last Name') }}:** {{ $last_name }}<br>
@endif
@if($email)
**{{ __('Email') }}:** {{ $email }}<br>
@endif
@if($phone)
**{{ __('Phone') }}:** {{ $phone }}<br>
@endif
@if($street)
**{{ __('Street') }}:** {{ $street }}<br>
@endif
@if($number)
**{{ __('House No.') }}:** {{ $number }}<br>
@endif
@if($postal_code)
**{{ __('Postal code') }}:** {{ $postal_code }}<br>
@endif
@if($city)
**{{ __('City') }}:** {{ $city }}<br>
@endif

@if($notice)
**{{ __('Message') }}:**

{{ $notice }}
@endif

@if($privacy)
**{{ __('Privacy') }}:** ✓
@endif

---

Diese E-Mail wurde über das Kontaktformular auf {{ config('app.url') }} gesendet.
</x-mail::message>
