<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;

class WeatherAPIHelper
{

    public function handle(string $lat, string $lon, string $city): object
    {
        $response = Http::timeout(120)->get('https://api.openweathermap.org/data/2.5/onecall', [
            'lat' => $lat,
            'lon' => $lon,
            'exclude' => 'minutely,hourly,daily,alerts',
            'appid' => config('config.open_weather_map_api_key'),
            'units' => 'metric'
        ]);

        if ($response->status() != 200) {
            throw new Exception($response->body(), $response->status());
        }

        return (object) [

            'data' => json_decode($response->body()),
            'city' => $city

        ];
    }
}
