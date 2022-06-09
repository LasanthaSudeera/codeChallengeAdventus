<?php

return [

    'cities' => [
        env('CITY_ONE_NAME', 'Kandy') => [
            'long' =>  env('CITY_ONE_LONG', '07°18\'N'),
            'lat' =>  env('CITY_ONE_LAT', '80°43\'E')
        ],
        env('CITY_TWO_NAME', 'COLOMBO') => [
            'long' =>  env('CITY_TWO_LONG', '06°56\'N'),
            'lat' =>  env('CITY_TWO_LAT', '79°51\'E')
        ],
    ],

];
