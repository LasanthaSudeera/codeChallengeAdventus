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

        $orderBy = 'created_at';
        if ($request->get('hottest')) {
            $orderBy = 'temp';
        }

        $temps->with(['temperatures' => fn ($q) => $q->where('user_id', $user->id)->orderBy($orderBy, 'desc')]);

        if ($limit = $request->get('limit')) {
            return response()->json($temps->paginate($limit), 200);
        }
        return response()->json($temps->get(), 200);
    }
}
