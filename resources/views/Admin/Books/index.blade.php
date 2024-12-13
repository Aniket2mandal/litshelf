@extends('Admin.layouts.app')

@section('content')
    {{-- FOR SUCESS MESSAGE --}}
    {{-- @include('admin.message') --}}

    <div class="success">
        @if (session('success'))
            <div class='container alert alert-success'>{{ session('success') }}</div>
        @endif
    </div>
    <div class="category-header">
        <h1>BOOKS TABLE</h1>
        {{-- <a href="{{route('Category.createmail')}}" class="btn btn-danger" id="del_btn">Send Mail</a> --}}
    </div>


    {{-- @foreach ($categories as $item)
<p>{{$item->CategoryName}}</p>
AFTER USING PLUCK FUNCTION
<p>{{$item}}</p>
@endforeach --}}


    <table class=" table">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Published</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            {{-- @foreach ($categories as $categoryname) --}}
            @foreach ($books as $items)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $items->Title }}</td>
                    <td>{{ $items->Author }}</td>
                    <td>{{ $items->PublishDate }}</td>
                    <td>{{ $items->Price }}</td>
                    <td>{{ $items->Description }}</td>
                    {{-- <td>{{$categories->CategoryName}}</td> --}}

                    <td>

                        {{$items->category->CategoryName}}

                    </td>

                    <td>
                        @if ($items->image)
                            <img src="{{ asset('images/' . $items->image) }}" style="width: 100px;height:100px">
                        @else
                            <img src="#">
                        @endif
                    </td>

                    <td><a href="{{ route('books.edit', $items->id) }}" class="btn-primary "><img src="/images/editimg.png"
                                style="height:25px;width:20px"></a>
                        <a href="{{ route('books.delete', $items->id) }}" class="btn-danger" id="del_btn"><img
                                src="/images/deleteimg.png" style="height:25px;width:20px"></a>
                    </td>

                </tr>
            @endforeach
            {{-- @endforeach --}}
        </tbody>
    </table><br>
    <a href="{{ route('books.create') }}"class=" btn-success">Add Books</a>
    {{-- <script>
    $(document).ready(function(){
        $("#del_btn").click(function(){
        confirm("Are you sure you want to delete");
        })
    })
    </script> --}}
@endsection
