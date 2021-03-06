<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\UserCityTemperature;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserService
{

    public function getUserCityTemperature(City $city, Request $request, Authenticatable $user): object
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

    public function deleteUserCityTemperature(City $city, $tempId, Authenticatable $user): object
    {
        $temp = UserCityTemperature::find($tempId);

        if (is_null($temp)) return $this->toObject([
            'status' => 404,
            'message' => 'No matching record found!'
        ]);

        if ($temp->user_id != $user->id) {
            return $this->toObject([
                'status' => 404,
                'message' => 'No matching record found!'
            ]);
        }

        if ($temp->city_id != $city->id) {
            return $this->toObject([
                'status' => 404,
                'message' => 'No matching record found!'
            ]);
        }

        $temp->delete();

        if ($temp) {
            return $this->toObject([
                'status' => 204,
            ]);
        }

        return $this->toObject([
            'status' => 500,
            'message' => 'Failed to delete the record, please try again!'

        ]);
    }

    private function toObject(array $array): object
    {
        return (object) $array;
    }
}
