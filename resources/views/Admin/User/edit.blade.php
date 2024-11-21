@extends('Admin.layouts.app')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>
        {{-- value={{$category_data->CategoryName}} --}}
        <div class="card-body">
            <form method="POST" action="{{ route('users.update',$user->id) }}">
                @csrf


                <div class="form-group">
                    <label for="categoryName">Name</label>
                    <input type="text" class="form-control" id="categoryName" value="{{$user->name}}" name="name">
                    {{-- Error Message --}}
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoryName">Email</label>
                    <input type="email" class="form-control" id="categoryName" value={{$user->email}} name="email">
                    {{-- Error Message --}}
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Role</label>
                    <select id="status" class="form-control" name="role">
                        <option value="2" <?php if ($user->role == '2') echo 'selected'; ?>>Admin</option>
                        <option value="1" <?php if ($user->role  == '1') echo 'selected'; ?>>User</option>
                        <option value="0" <?php if ($user->role  == '0') echo 'selected'; ?>>Super Admin</option>
                    </select>
                    {{-- Error Message --}}
                    @error('role')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-create">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
