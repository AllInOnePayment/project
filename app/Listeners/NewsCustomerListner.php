<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LatestNewsMail;

class NewsCustomerListner implements ShouldQueue
{
     
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    { 
        foreach ($event->user as $row) {
            Mail::to($row->email)->send(new LatestNewsMail($event->message));  
        }
    }
}
