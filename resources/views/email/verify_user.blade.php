@component('mail::message')
# Hello {{ $user->fullname() }}

Your account has been verified <br>
You can now have access to all our premium services

Thanks,<br>
{{ config('app.name') }}
@endcomponent
