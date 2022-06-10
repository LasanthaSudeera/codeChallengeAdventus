<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\UserCityTemperature;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserService
{

    public function getUserCityTemperature(City $city, Request $request, Authenticatable $user) : object
    {
        $temps =  UserCityTemperature::query();

        $temps->where('user_id', $user->id)->where('city_id', $city->id);

        $orderBy = 'created_at';
        if ($request->get('hottest')) {
            $orderBy = 'temp';
        }
        $temps->orderBy($orderBy, 'desc');

        if ($limit = $request->get('limit')) {
            return $this->toObject([
                'city' => $city,
                'temperatures' => $temps->paginate($limit)
            ]);
        }

        return $this->toObject([
            'city' => $city,
            'temperatures' => $temps->get()
        ]);
    }

    private function toObject(array $array)
    {
        return (object) $array;
    }
}
