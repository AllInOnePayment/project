@component('mail::message')
Welcome To All-In-One Billing System

We are happy to announce that your service is active as of now, you can login to our system and start your program. We would like to thank you for working with as, we are happy to share the journey a head of us with you. Your Username and Password 

 
<p>body  :  {{$detials['body']}}</p>

@component('mail::button', ['url' => 'www.allinone.com'])
Visit Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
