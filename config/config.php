<?php

return [

    'cities' => [

        'CITY_ONE' => [
            'long' =>  env('CITY_ONE_LONG', '79.8612'),
            'lat' =>  env('CITY_ONE_LAT', '6.9271'),
            'name' =>  env('CITY_ONE_NAME', 'Colombo')
        ],

        'CITY_TWO' => [
            'long' =>  env('CITY_TWO_LONG', '144.9631'),
            'lat' =>  env('CITY_TWO_LAT', '37.8136'),
            'name' =>  env('CITY_TWO_NAME', 'Melbourne')
        ],
    ],

    'open_weather_map_api_key' => env('OPEN_WEATHER_MAP_API_KEY', null)

];
