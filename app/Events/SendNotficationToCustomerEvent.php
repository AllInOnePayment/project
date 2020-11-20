<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotficationToCustomerEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $message;
    public $req;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data, $message,$req)
    {
        $this->data = $data;
        $this->message = $message;
        $this->req = $req;
    }

}
