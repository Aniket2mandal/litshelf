@extends('Admin.layouts.app')
@section('content')



<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Create User</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="form-group">
                    <label for="categoryName">Name</label>
                    <input type="text" class="form-control" id="categoryName" value="{{old('name')}}" name="name">
                    {{-- Error Message --}}
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoryName">Email</label>
                    <input type="email" class="form-control" id="categoryName" value="{{old('email')}}" name="email">
                    {{-- Error Message --}}
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Role</label>
                    <select id="status" class="form-control" name="role">
                        <option value="2">Admin</option>
                        <option value="1">User</option>
                        <option value="0">Super Admin</option>
                    </select>
                    {{-- Error Message --}}
                    @error('role')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="categoryName">Password</label>
                    <input type="password" class="form-control" id="categoryName" name="password">
                    {{-- Error Message --}}
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoryName">Confirm Password</label>
                    <input type="password" class="form-control" id="categoryName" name="password_confirmation">
                    {{-- Error Message --}}
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-create">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection
