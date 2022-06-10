<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Models\UserCityTemperature;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{

    public function getUser()
    {
        return auth('sanctum')->user();
    }

    public function getUserCityTemperatures(City $city, Request $request, UserService $service)
    {
        $temps = $service->getUserCityTemperature(
            $city,
            $request,
            auth('sanctum')->user()
        );

        return response()->json($temps, 200);
    }

    public function deleteUserCityTemperature(City $city, $id, UserService $service)
    {
        $temp = $service->deleteUserCityTemperature($city, $id, auth('sanctum')->user());
        return response()->json($temp, $temp->status);
    }
}
