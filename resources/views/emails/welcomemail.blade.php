@component('mail::message')
# Welcome to {{ $user->name }}!

<p>On behalf of all our employees, we would like to thank You for showing us Your trust. </p>
<br>

<p>Our goal is to be the absolute best Broker for Forex and Binary Options Trading. We offer you our highly acclaimed service loved by our clients.
    Our team works 24/7 to maintain the highest standards and to meet and exceed all of your expectations!
    Please login on our website using this...
</p><br>
<strong>
    Email: {{ $user->email }} <br>
    And your password
</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
