<?php

namespace App\Listeners;

use App\Providers\NewManagerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInfoMail;

class WelcomeManagerEmailListener
{
     
    /**
     * Handle the event.
     *
     * @param  NewManagerHasRegisteredEvent  $event
     * @return void
     */
    public function handle(NewManagerHasRegisteredEvent $event)
    {
        Mail::to($event->managersend->email)->send(new SendInfoMail());    
    }
}
