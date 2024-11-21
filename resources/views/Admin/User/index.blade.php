@extends('Admin.layouts.app')

@section('content')

    {{-- FOR SUCESS MESSAGE --}}
    {{-- @include('admin.message') --}}

    <div class="success">
        @if(session('success'))
        <div class='container alert alert-success'>{{session('success')}}</div>
       @endif
      </div>
    <div class="category-header">
        <h1>USER TABLE</h1>
{{-- <a href="{{route('Category.createmail')}}" class="btn btn-danger" id="del_btn">Send Mail</a> --}}
    </div>



  <table  class=" table">
    <thead>
      <tr>
        <th scope="col">S.N.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
        $i=1;
        @endphp
        @foreach($users as $items)
      <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$items->name}}</td>
        <td>
            {{$items->email }}
        </td>
        <td>
            @if($items->role==2)
           {{'Admin'}}
           @else
           {{'User'}}
           @endif
        </td>
        <td><a href="{{route('users.edit',$items->id)}}" class="btn-primary "><img src="/images/editimg.png" style="height:25px;width:20px"></a>
        <a href="{{route('users.delete',$items->id)}}" class="btn-danger" id="del_btn"><img src="/images/deleteimg.png" style="height:25px;width:20px"></a>

    </td>
      </tr>
      @endforeach
    </tbody>
  </table><br>
  <a href="{{route('users.create')}}"class=" btn-success">Add User</a>
{{-- <script>
    $(document).ready(function(){
        $("#del_btn").click(function(){
        confirm("Are you sure you want to delete");
        })
    })
    </script> --}}

@endsection
