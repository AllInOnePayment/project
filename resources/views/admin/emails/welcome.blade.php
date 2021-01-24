@component('mail::message')
Welcome To All-In-One Billing System

We are happy to announce that your service is active as of now, you can login to our system and start your program. We would like to thank you for working with as, we are happy to share the journey a head of us with you. Your Username and Password 


<h2>UserName  :  {{$message['username']}}</h2>
<h2>Password  :  {{$message['password']}}</h2>

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Visit Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
