@component('mail::message')
# Task Assignment

Task _{{ $title }}_ have been assigned to you.

@component('mail::button', ['url' => $url ])
    View task
@endcomponent

<br>Thanks,
{{ config('app.name') }}
@endcomponent
