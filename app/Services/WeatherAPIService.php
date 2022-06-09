<?php

namespace App\Services;

use Exception;
use App\Models\City;
use App\Actions\WeatherAPIAction;
use App\Models\UserCityTemperature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WeatherAPIService
{

    public function saveUserWeatherReports($userId)
    {

        $cities = City::all();

        try {
            foreach ($cities as $city) {

                $action = new WeatherAPIAction();
                $weather = $action->handle(
                    $city->lat,
                    $city->long,
                    $city->name
                );

                UserCityTemperature::create([
                    'user_id' => $userId,
                    'city_id' => $city->id,
                    'temp' => $weather->data->current->temp,
                ]);
            }
        } catch (Exception $e) {
            //throw $th;
        }
    }
}
