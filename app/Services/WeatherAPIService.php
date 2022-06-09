<?php

namespace App\Services;

use App\Helpers\WeatherAPIHelper;

class WeatherAPIService
{
    public function getCityOneWeather()
    {
        $action = new WeatherAPIHelper();
        $weather = $action->handle(
            config('config.cities.CITY_ONE.lat'),
            config('config.cities.CITY_ONE.long'),
            config('config.cities.CITY_ONE.name')
        );

        return $weather;
    }

    public function getCityTwoWeather()
    {
        $action = new WeatherAPIHelper();
        $weather = $action->handle(
            config('config.cities.CITY_TWO.lat'),
            config('config.cities.CITY_TWO.long'),
            config('config.cities.CITY_TWO.name')
        );

        return $weather;
    }


}
