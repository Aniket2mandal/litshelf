@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd; margin-left:50px;margin-right:50px;">
<div class="logo" style="margin-left:10px">
    <a class="nav-item nav-link active" href="{{route('home')}}"><h1>CRUD</h1></a>
</div>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left:90%">
        <a class="nav-item nav-link active" href="{{route('Category.index')}}">Home</a>
        <a class="nav-item nav-link" href="{{route('Category.create')}}">Create</a>
        {{-- <a class="nav-item nav-link" href="#">Pricing</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a> --}}
      </div>
    </div>
  </nav>
<hr>
  <h1 style="text-align: center;color:red;">CREATE CATEGORY</h1><br><br>
  <div class="card container">
    <div class="card-header">
<h4>Create Category</h4>
    </div>
</div>
<div class="card container">
    <div class="card-body">
  <form style="margin-left:60px;margin-right:60px;" method="POST" action="{{route('Category.mailindex')}}">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <label>Title</label>
        <input type="text" class="form-control"  name="title">
      </div>
      <div class="col-md-6">
        <label>Email To</label>
        <input type="text" class="form-control"  name="mailto">
      </div>
      <div class="col-md-6">
        <label>body</label>
        <input type="text" class="form-control"  name="body">
      </div><br>
  </form>
  <div class="col-md-8">
    <button type="submit"class="btn btn-primary">Send</button>
</div>
    </div>
</div>
@endsection
