@extends('auth.common')

@section('content')
    <div class="row vh-100">
        <div class="col-6 pt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="main-text text-white animate__animated animate__zoomInDown mt-5">
                        Simple Weather
                    </h1>
                </div>
            </div>
            <div class="row  animate__animated animate__zoomInDown animate__delay-1s">
                <div class="col-12">
                    <div class="mt-4 py-3">
                        <h2 class="text-white">What is simple weather?</h2>
                        <h5 class="text-white m-top-20">
                            Just simply signup if you already don't have an account.
                            Simple weather is the easiest application to compare weather in multiple locations.
                            Know what's its like always.
                        </h5>

                    </div>
                </div>
            </div>

            <div class="row mt-3  animate__animated animate__zoomInDown animate__delay-3s">
                <div class="col-12">
                    <div class="mt-4 py-3">
                        <h2 class="text-white">Also available on</h2>
                        <div class="d-flex">
                            <img class="mx-1" src="{{ asset('images/googleplay.png') }}" />
                            <img class="mx-1" src="{{ asset('images/appstor.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 my-auto">
            <div class="row login-box animate__animated animate__fadeIn animate__delay-2s">
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4 login-text text-white">
                                Sign In
                            </h3>
                        </div>
                        <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-facebook"></span></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-twitter"></span></a>
                            </p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <label class="mb-1" for="username">Username | Email</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="text" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label class="mb-1" for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                Sign In
                            </button>
                        </div>
                        <div class="form-group d-md-flex mt-5"></div>
                    </form>
                    <p class="text-center">
                        Not a member?
                        <a data-toggle="tab" href="{{ route('register') }}">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
