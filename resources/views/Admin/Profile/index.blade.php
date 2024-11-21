@extends('Admin.layouts.app')
@section('content')

    <link rel="stylesheet" href="/css/admin/profile.css">
    <div class="profilecontainer">
        <div class="profilecard">
            <div class="profilecircle">
                <img src="/css/raw/profile.png">
            </div>
            <div class="fullname">

                <h2>{{$user->name}}</h2>
                <h2>{{$user->email}}</h2>

            </div>

    <a href="{{route('admin.logout')}}" class="logout">Logout</a>

        </div>
    </div>
@endsection
