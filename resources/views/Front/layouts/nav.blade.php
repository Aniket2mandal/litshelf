<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<link rel="stylesheet" href="{{asset('css/about.css')}}">
<link rel="stylesheet" href="{{asset('css/navigation.css')}}">

<link rel="stylesheet" href="{{asset('css/productpage/cart.css')}}">
<link rel="stylesheet" href="{{asset('css/productpage/order.css')}}">
<link rel="stylesheet" href="{{asset('css/categorypage/frontcategory.css')}}">
    <body>
        <div class="nav">
            <div class="logo">
                <a href="{{route('front.index')}}"><img src="{{asset('css/raw/logo.png')}}"></a>
            </div>
            <div class="lists">
                <a href="{{route('front.category')}}">Categories</a>
                <a href="#">About</a>

                <a href="{{route('front.order')}}">Orders</a>
                {{-- <a href="">  <div class="nav-profile">

                </div><a> --}}

            <a href="{{route('cart.page')}}"><img class="cart" src="/css/raw/cart.png"></a>
            <div class="cart-notification" id="cart-notification" style="display: none;">0</div>
            <a href="{{route('user.profile')}}"><img style="margin-right:15px;"src="/css/raw/profile.png"></a>
        </div>
            {{-- <div class="nav-profile">{{route('user.profile')}}
                <a href=""><img src="/raw/profile.png"></a>
            </div> --}}
        </div>
        @yield('content1')

    </body>
    </html>
