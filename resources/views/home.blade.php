@extends('layouts.app')

@section('content')
    <div class="container">
        <home-component channel-name="{{Auth::user()->username}}" ></home-component>
    </div>
@endsection
