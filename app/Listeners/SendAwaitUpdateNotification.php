<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use App\Events\PriorUpdateTempNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAwaitUpdateNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        broadcast(new PriorUpdateTempNotification($user));
    }
}
