<?php

return [

    'cities' => [

        'CITY_ONE' => [
            'long' =>  env('CITY_ONE_LONG', '07.18'),
            'lat' =>  env('CITY_ONE_LAT', '80.43'),
            'name' =>  env('CITY_ONE_NAME', 'Kandy')
        ],

        'CITY_TWO' => [
            'long' =>  env('CITY_TWO_LONG', '06.56'),
            'lat' =>  env('CITY_TWO_LAT', '79.51'),
            'name' =>  env('CITY_TWO_NAME', 'Colombo')
        ],
    ],

    'open_weather_map_api_key' => env('OPEN_WEATHER_MAP_API_KEY', null)

];
