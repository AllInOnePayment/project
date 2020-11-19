<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue; 
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class NewManagerRegisteredListener
{ 

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    { 
        Mail::to($event->message['email'])->send(new WelcomeMail($event->message));
    }
}
