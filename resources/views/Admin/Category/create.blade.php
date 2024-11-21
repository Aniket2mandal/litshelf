@extends('Admin.layouts.app')
@section('content')



<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Create Category</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" value="{{old('CategoryName')}}" name="CategoryName">
                    {{-- Error Message --}}
                    @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        <option value="Active">Active</option>
                        <option value="Block">Block</option>
                    </select>
                    {{-- Error Message --}}
                    @error('status')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-create">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection
