<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<link rel="stylesheet" href="css/about.css">

<body>
    <div class="app">
    <div class="navigation">
        <div class=logo>
        <a href="{{route('index')}}">LOGO</a>
        </div>
        <div class=lists>

@if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" >Home</a>
                        <a href="{{route('about')}}">About</a>
                        <a href="{{route('profile')}}" >
                            <div class="profile">
                                <img src="images/profile.jpg">
                            </div>
                        </a>
                    @else
                    <a href="{{route('index')}}">Home</a>
                    <a href="{{route('about')}}">About</a>
                        <a href="{{ route('login') }}" >Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }} "class=signup>Signup</a>
                        @endif
                    @endauth
            @endif
        </div>
</div>
<main class="py-4">
    @yield('content1')
</main>
</div>
</body>
</html>