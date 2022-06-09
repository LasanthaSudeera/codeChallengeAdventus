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
            @yield('content')
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
