@extends('layouts.app')

@section('content')
<div class="container">
    <home-component
    city-one-name="{{config('config.cities.CITY_ONE.name')}}"
    city-two-name="{{config('config.cities.CITY_TWO.name')}}"
    ></home-component>
</div>
@endsection
