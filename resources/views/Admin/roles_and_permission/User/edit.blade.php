@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd; margin-left:50px;margin-right:50px;">
<div class="logo" style="margin-left:10px">
    <a class="nav-item nav-link active" href="{{route('home')}}"><h1>CRUD</h1></a>
</div>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left:80%">
        <a class="nav-item nav-link active" href="{{route('roles_and_permission.User.index')}}">User Info</a>
        <a class="nav-item nav-link" href="{{route('roles_and_permission.User.create')}}">Create User</a>
        {{-- <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a> --}}
      </div>
    </div>
  </nav>
<hr>
  <h1 style="text-align: center;color:red;">Edit User</h1><br><br>
  <form style="margin-left:60px;margin-right:60px;" method="POST" action="{{route('roles_and_permission.User.update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-6">
        <label>Name</label>
        <input type="text" class="form-control" value="{{ $user->name}}" name="name">
      </div>
      <div class="col-md-6">
        <label>Email</label>
        <input type="text" class="form-control" value="{{ $user->email}}" name="email">
      </div><br>

      <select class="container form-select"name="role[]" aria-label="Default select example" multiple>
        <option selected>Roles</option>
        @foreach($role as $item)
        <option value="{{$item->name}}">{{$item->name}}</option>
       @endforeach
      </select>
      <br>
    </div>

<br>

    <button type="submit"class="btn btn-primary">Update</button>
  </form>
@endsection
