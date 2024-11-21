@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd; margin-left:50px;margin-right:50px;">
<div class="logo" style="margin-left:10px">
    <a class="nav-item nav-link active" href="{{route('home')}}"><h1>CRUD</h1></a>
</div>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left:80%">
        {{-- <a class="nav-item nav-link active" href="{{route('Category.index')}}">Category</a>
        <a class="nav-item nav-link" href="{{route('Category.create')}}">Post</a> --}}
        {{-- <a class="nav-item nav-link" href="{{route('Category.create')}}">Roles</a> --}}
        <a class="nav-item nav-link" href="{{route('roles_and_permission.Permission.index')}}">Permissions</a>
        <a class="nav-item nav-link" href="{{route('roles_and_permission.Permission.create')}}">Create Permission</a>
        {{-- <a class="nav-item nav-link" href="{{route('Category.create')}}">Users</a> --}}
        {{-- <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a> --}}
      </div>
    </div>
  </nav>
<hr>
<div class="card container">
    <div class="card-header">
    <h4>Create Permissions</h4>
    </div>
</div>
<div class="card container">
    <div class="card-body">
<form class="container" method="POST" action="{{route('roles_and_permission.Permission.store')}}">
    @csrf
    <div class="container mb-3" >
      {{-- <label class="form-label">Create Permission</label> --}}
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
    </div>
</div>
@endsection
