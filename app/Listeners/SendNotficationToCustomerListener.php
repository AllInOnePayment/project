<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendServiceNotfication;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Register;

class SendNotficationToCustomerListener
{
   
    
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {   if($event->req==4){
        foreach($event->data  as $row)
        {
            Mail::to($row->register->user->email)->send(new SendServiceNotfication($event->message));
        }
        }
        else{
            foreach($event->data  as $row)
        {
            Mail::to($row->user->email)->send(new SendServiceNotfication($event->message));
        }
        }
        
    }
}
