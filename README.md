
## Overview

- Bootstrap
- VueJS
- SQLite
- Animate.css
- SweetAlert
- Laravel Websockets

I have used Services, Actions, Events and Listeners for the core of the solution to make the solution more responsive and minimize delays due to API callings. Used Animate.css to make the UI more interactive. SweetAlert to display alerts and feedbacks to the user. VueJs as its very easy to prototype working UIs. Used bootstrap for common stylings. Used laravel websocket to make the app realtime.



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

Run the websocket server
- php artisan websockets:serve

Final step is to run the local server
- php artisan serve

