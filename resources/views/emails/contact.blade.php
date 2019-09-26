@component('mail::message')
# New Offer

You have new offers.
@component('mail::panel')
    Name: {{ $message['name'] }}
@endcomponent
@component('mail::panel')
    Phone: {{ $message['subject'] }}
@endcomponent
@component('mail::panel')
    Email: {{ $message['email'] }}
@endcomponent
@component('mail::panel')
    Message: {{ $message['message'] }}
@endcomponent

@component('mail::button', ['url' => ''])
    Show Offers
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
