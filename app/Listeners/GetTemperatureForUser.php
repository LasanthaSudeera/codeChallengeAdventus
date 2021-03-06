<?php

namespace App\Listeners;

use App\Events\UpdateTempNotification;
use App\Services\WeatherAPIService;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetTemperatureForUser implements ShouldQueue
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

        $service = new WeatherAPIService();
        $service->saveUserWeatherReports($user->id);

        broadcast(new UpdateTempNotification($user));
    }
}
