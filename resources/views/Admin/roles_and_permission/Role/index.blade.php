@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd; margin-left:50px;margin-right:50px;">
<div class="logo" style="margin-left:10px">
    <a class="nav-item nav-link active" href="{{route('home')}}"><h1>CRUD</h1></a>
</div>
    <div class="collapse navbar-collapse container" id="navbarNavAltMarkup">
      <div class="navbar-nav constainer" style="margin-left:85%" >
        <a class="nav-item nav-link" href="{{route('roles_and_permission.Role.index')}}">Role</a>
        <a class="nav-item nav-link active" href="{{route('roles_and_permission.Role.create')}}">Create</a>
        {{-- <a class="nav-item nav-link" href="{{route('Category.create')}}">Post</a> --}}
        {{-- <a class="nav-item nav-link" href="{{route('Category.create')}}">Roles</a> --}}

        {{-- <a class="nav-item nav-link" href="{{route('Category.create')}}">Users</a> --}}
        {{-- <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a> --}}
      </div>
    </div>
  </nav>
<hr>
@if(session('status')){
    <div class="container alert alert-success">{{session('status')}}</div>
  }
  @endif
  <div class="container card">
    <div class="card-header">
    <h4>Roles</h4>
    </div>
  </div>
<div class="container card">
  <div class="card-body">
  <table class="container table">
    <thead>
      <tr>
        <th scope="col">S.n.</th>
        <th scope="col">Roles</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @php
        $i=1;
        @endphp
        @foreach($role as $items)
        <th scope="row">{{$i++}}</th>
        <td>{{$items->name}}</td>
        <td>
            <a href="{{route('roles_and_permission.Role.give-permission',$items->id)}}" class="btn btn-warning">Add/Edit Role Permission</a>
            <a href="{{route('roles_and_permission.Role.edit',$items->id)}}" class="btn btn-success">Edit</a>
            <a href="{{route('roles_and_permission.Role.delete',$items->id)}}" class="btn btn-danger" id="del_btn">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>
  </div>
@endsection

