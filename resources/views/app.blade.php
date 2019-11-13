<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HouseOfTweets</title>
    <link rel="stylesheet" href="/css/app.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;

    }

    .title {
        font-size: 27px;
        color: black;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    </style>
</head>
<body>
    <div id="app">
        <div class="content">

            <div class="row">
                <div id="homepagerightside" class="container">
                    You’re one step away from the shiny new Twitter.com
                </div>

                <div id="logincontainer" class="container">
                    <form method="POST" action="{{ route('login') }}" class="form-inline">
                        @csrf

                        <label class="sr-only" for="login">{{ __('Login') }}</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <!-- <div class="input-group-text"></div> -->
                            </div>
                            <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                            @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <label class="sr-only" for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control mb-2 mr-sm-2 @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-check mb-2 mr-sm-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">{{ __('Login') }}</button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif

                    </form>

                    <div class="card-body">

                        <div class="title m-b-md">
                            See what's happening in a the world right now
                        </div>
                        <p>Join HouseOfTweets today.</p>
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @else
                        <div class="loginbutton">
                            <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('login') }}" role="button">Login</a>
                        </div><br>
                        @if (Route::has('register'))
                        <div class="signupbutton">
                            <a class="btn btn-primary btn-lg btn-block" href="{{ route('register') }}" role="button">Sign up</a>
                        </div>
                        @endif
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('/js/app.js') }}"></script>
</body>
</html>
