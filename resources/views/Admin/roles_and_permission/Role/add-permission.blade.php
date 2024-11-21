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
  <h1 style="text-align: center;color:green;">Assign Permission To Role</h1><br><br>
  {{-- <div class="card container">
    <div class="card-header">
    <h4>Create Roles</h4>
    </div> --}}
</div>
<div class="card container">
    <div class="card-header">
<h4>Role: {{ $role->name}}</h4>
    </div>
</div>
<div class="card container">
    <div class="card-body">
  <form style="margin-left:60px;margin-right:60px;" method="POST" action="{{route('roles_and_permission.Role.give-permission-update',$role->id)}}">
    @csrf
    @method('PUT')
    <div class="row">
        @if(session('status'))
            <div class="container alert alert-success">{{session('status')}}</div>
          @endif
          <div class="container">

<div class="row">
            @foreach($permission as $item)
            <div class="col-md-3">
            <label>
            <input type="checkbox" value="{{$item->name}}"
            {{in_array($item->id,$rolespermission)?'checked':''}}
            name="permission[]"> {{$item->name}}
        </label>
    </div>
            @endforeach
      </div>

    </div>
</div>
<br>

    <button type="submit"class="btn btn-primary">Add</button>
  </form>
    </div>
</div>
@endsection
