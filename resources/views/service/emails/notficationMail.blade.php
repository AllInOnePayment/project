@component('mail::message')
# Urgent Notice


<div class="container">
{{ $message['body']}}
</div>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
