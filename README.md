
## Overview

- Bootstrap
- VueJS
- SQLite
- Animate.css

I have used Services, Actions, Events and Listeners for the core of the solution. To keep the code manageable Events listeners will be responsible for the API communication.



## Deployment

Rename env.example to .env, and change the following accordingly
- CITY_ONE_NAME=
- CITY_ONE_LONG=
- CITY_ONE_LAT=
- CITY_TWO_NAME=
- CITY_TWO_LONG=
- CITY_TWO_LAT=
- OPEN_WEATHER_MAP_API_KEY=
- APP_NAME=

Run the migrations
- php artisan migrate

Next run the following command to initial basic settings
- php artisan initial:setup

The application uses Queue to manage API calls and mails. 
- php artisan queue:work

