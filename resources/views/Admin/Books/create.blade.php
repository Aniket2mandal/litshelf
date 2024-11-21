@extends('Admin.layouts.app')
@section('content')



<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Add Books</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" class="form-control" value="{{ old('Title') }}" name="Title">
                    {{-- Error Message --}}
                    @error('Title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" class="form-control" value="{{ old('Author') }}" name="Author">
                    {{-- Error Message --}}
                    @error('Author')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                    {{-- Error Message --}}
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="PublishDate">Published</label>
                    <input type="date" class="form-control" value="{{ old('PublishDate') }}" name="PublishDate">
                    {{-- Error Message --}}
                    @error('PublishDate')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" class="form-control" value="{{ old('Price') }}" name="Price">
                    {{-- Error Message --}}
                    @error('Price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="Description" rows="4" cols="50">{{ old('Description') }}</textarea>
                    {{-- Error Message --}}
                    @error('Description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="CategoryId">Category</label>
                    <select id="CategoryId" class="form-control" name="CategoryId">
                        <option value="">Select Category</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}" {{ old('CategoryId') == $item->id ? 'selected' : '' }}>{{ $item->CategoryName }}</option>
                        @endforeach
                    </select>
                    {{-- Error Message --}}
                    @error('CategoryId')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>


@endsection
