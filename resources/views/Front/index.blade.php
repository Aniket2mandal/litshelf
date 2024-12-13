@extends('Front.layouts.nav')

@section('content1')

{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

{{-- <link rel="stylesheet" href="css/welcome.css"> --}}

<div class="top-body">

    <img src="{{asset('images/books.jpg')}}">
    <div class="transparent">
        <pre>Every book is a new
adventure waiting to
be explored.</pre>
        <a href="" class=" btn-light">Learn more</a>
    </div>
</div>
<div class=category-btn>
    <select id="CategoryId" class="form-control" name="CategoryId">
        <option value="">Select Category</option>
     @foreach($categories as $item)
                            <option value="{{ $item->id }}" {{ old('CategoryId') == $item->id ? 'selected' : '' }}>{{ $item->CategoryName }}</option>
                        @endforeach

    </select>
</div>
<div class="books-header">
    <h1>DISCOVER YOUR NEXT BOOK</h1>
</div>
<div class="sub-header">
    <h1>Our Populars</h1>
</div>


<div class="new-arrival">
    {{-- first book --}}
    @foreach ($book as $item)
        <div class="book1">
            @if ($item->image)
                <img src="{{ asset('images/' . $item->image) }}" style="width: 150px;height:150px">
            @else
                <img src="#">
            @endif
            <div class="description">
                <pre>{{ $item->Title }}<br>
        </pre>
                <p>{{ $item->Price }}</p>
            </div>
            <div class="btn">
                {{-- <a href="#" class=" btn-warning">Add To Cart</a> --}}
                <a href="{{ route('front.product', $item->id) }}" class=" btn-primary" class="a2">View Detail</a>
            </div>
        </div>
    @endforeach
</div>


<div class="header">
    @foreach ($books as $item)
    @if(count($item->book) !==0)
        <div class="sub-header2">
            <h1>{{ $item->CategoryName }}</h1>
        </div>
        <div class="new-arrival2">
        @foreach($item->book as $bookdata)

            {{-- first book --}}

            <div class="book1">
                @if ($bookdata->image)
                    <img src="{{ asset('images/' . $bookdata->image) }}" style="width: 150px;height:150px">
                @else
                    <img src="#">
                @endif
                <div class="description">
                    <pre>{{ $bookdata->Title }}<br>
                    </pre>
                    <p>{{ $bookdata->Price }}</p>
                </div>
                <div class="btn">
                    {{-- <a href="#" class=" btn-warning">Add To Cart</a> --}}
                    <a href="{{ route('front.product', $bookdata->id) }}" class=" btn-primary" class="a2">View
                        Detail</a>
                </div>
            </div>
            @endforeach
        </div>
@endif
    @endforeach

</div>


 {{-- FOR FOOTER --}}
 {{-- @extends('layouts.footer')
 @section('footer')
 @endsection --}}

 @endsection
