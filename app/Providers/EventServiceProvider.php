<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\NewsForAllCustomerEvent;
use App\Events\NewManagerHasRegisteredEvent;
use App\Events\SendNotficationToCustomerEvent;
use App\Listeners\NewsCustomerListner;
use App\Listeners\SendNotficationToCustomerListener;
use App\Listeners\NewManagerRegisteredListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewsForAllCustomerEvent::class => [
            NewsCustomerListner::class,
        ],
        NewManagerHasRegisteredEvent::class => [
            NewManagerRegisteredListener::class,
        ],
        SendNotficationToCustomerEvent::class => [
            SendNotficationToCustomerListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
