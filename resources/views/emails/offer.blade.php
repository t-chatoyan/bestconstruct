@component('mail::message')
# New Offer

You have new offers.
@component('mail::panel')
    Name: {{ $offer['name'] }}
@endcomponent
@component('mail::panel')
    Phone: {{ $offer['phone_number'] }}
@endcomponent
@component('mail::panel')
    Email: {{ $offer['email'] }}
@endcomponent
@component('mail::panel')
    Message: {{ $offer['message'] }}
@endcomponent

@component('mail::button', ['url' => ''])
    Show Offers
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
