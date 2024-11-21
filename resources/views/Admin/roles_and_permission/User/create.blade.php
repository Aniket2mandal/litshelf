@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd; margin-left:50px;margin-right:50px;">
<div class="logo" style="margin-left:10px">
    <a class="nav-item nav-link active" href="{{route('home')}}"><h1>CRUD</h1></a>
</div>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left:85%">
        {{-- <a class="nav-item nav-link active" href="{{route('Category.index')}}">Category</a>
        <a class="nav-item nav-link" href="{{route('Category.create')}}">Post</a> --}}
        {{-- <a class="nav-item nav-link" href="{{route('Category.create')}}">Roles</a> --}}
        <a class="nav-item nav-link" href="{{route('roles_and_permission.User.index')}}">User Info</a>
        {{-- <a class="nav-item nav-link" href="{{route('roles_and_permission.User.create')}}">Create User</a> --}}
        {{-- <a class="nav-item nav-link" href="{{route('Category.create')}}">Users</a> --}}
        {{-- <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a> --}}
      </div>
    </div>
  </nav>
<hr>

<form class="container" method="POST" action="{{route('roles_and_permission.User.store')}}">
    @csrf
    <div class="container mb-3" >
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="container mb-3" >
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="container mb-3" >
        <label class="form-label">Password</label>
        <input type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <select class="form-select"name="role[]" aria-label="Default select example" multiple>
        <option selected>Roles</option>
        @foreach($role as $item)
        <option value="{{$item->name}}">{{$item->name}}</option>
       @endforeach
      </select><br>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
