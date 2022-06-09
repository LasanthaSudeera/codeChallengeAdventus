<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Models\UserCityTemperature;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function getTemperatures(Request $request)
    {
        $user = auth('sanctum')->user();

        $temps = City::query();

        $temps->whereHas('temperatures', fn ($q) => $q->where('user_id', $user->id))->with('temperatures');

        if ($limit = $request->get('limit')) {
            return response()->json($temps->paginate($limit), 200);
        }
        return response()->json($temps->get(), 200);
    }
}
