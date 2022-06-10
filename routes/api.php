<?php

use App\Http\Controllers\API\ApiCityController;
use App\Http\Controllers\API\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {

    Route::group(['prefix' => 'user', 'as' => 'api.user.'], function () {
        Route::controller(ApiUserController::class)->group(function () {
            Route::get('me', 'getUser')->name('me');
            Route::get('/city/{city}/temperatures', 'getUserCityTemperatures')->name('getUserCityTemperatures');
        });
    });

    Route::group(['prefix' => 'cities', 'as' => 'api.cities.'], function () {
        Route::controller(ApiCityController::class)->group(function () {
            Route::get('', 'index')->name('index');
        });
    });
});
