<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app" class="container-fluid vh-100 vw-100 bg-cloud">
        <div class="container">
            <div class="row">
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
                                    Know whats its like always.
                                </h5>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
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
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="#" class="signin-form" data-bitwarden-watching="1">
                                <div class="form-group mt-3">
                                    <label class="mb-1" for="username">Username | Email</label>
                                    <input type="text" class="form-control" required="" />
                                </div>
                                <div class="form-group mt-2">
                                    <label class="mb-1" for="password">Password</label>
                                    <input id="password-field" type="password" class="form-control" required="" />
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
                                <a data-toggle="tab" href="#signup">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .main-text {
        font-family: "Ubuntu", sans-serif;
        font-size: 3.75rem;
        font-weight: 700;
        line-height: 4.5rem;
    }

    .login-text {
        font-family: "Ubuntu", sans-serif;
        font-size: 2.3rem;
        font-weight: 700;
    }

    .login-box {
        background-color: rgba(255, 255, 255, 0.603);
        height: 40em;
        margin: 4em 5em;
        border-radius: 8%;
    }

    .login-wrap {
        position: relative;
    }
</style>
