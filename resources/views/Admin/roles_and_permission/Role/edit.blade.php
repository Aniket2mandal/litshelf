@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd; margin-left:50px;margin-right:50px;">
<div class="logo" style="margin-left:10px">
    <a class="nav-item nav-link active" href="{{route('home')}}"><h1>CRUD</h1></a>
</div>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left:85%">
        <a class="nav-item nav-link active" href="{{route('roles_and_permission.Role.index')}}">Role</a>
        <a class="nav-item nav-link" href="{{route('roles_and_permission.Role.create')}}">Create</a>
        {{-- <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a> --}}
      </div>
    </div>
  </nav>
<hr>
  <h1 style="text-align: center;color:red;">Edit Role</h1><br><br>
  <form style="margin-left:60px;margin-right:60px;" method="POST" action="{{route('roles_and_permission.Role.update',$role->id)}}">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-6">
        <label>Role</label>
        <input type="text" class="form-control" value="{{ $role->name}}" name="name">
      </div>

    </div>

<br>

    <button type="submit"class="btn btn-primary">Update</button>
  </form>
@endsection
