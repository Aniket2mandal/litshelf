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
    @foreach($books as $item)
    <div class="book1">
        @if ($item->image)
                    <img src="{{asset('images/'.$item->image)}}" style="width: 150px;height:150px">
                    @else
                       <img src="#">
                    @endif
        <div class="description">
            <pre>{{$item->Title}}<br>
            </pre>
            <p>{{$item->Price}}</p>
        </div>
        <div class="btn">
            {{-- <a href="#" class=" btn-warning">Add To Cart</a> --}}
            <a href="{{route('front.product',$item->id)}}" class=" btn-primary" class="a2">View Detail</a>
        </div>
    </div>

@endforeach


    {{-- second book --}}
    {{-- <div class="book2">
        <img src="images/atomic.png">
        <div class="description">
            <pre>Atomic habit
</pre>
            <p>350</p>
        </div>
        <div class="btn">
            <a href="#" class=" btn-warning">Add To Cart</a>
            <a href="#" class=" btn-primary" class="a2">Buy</a>
        </div>
    </div> --}}
    {{-- third book --}}
    {{-- <div class="book3">
        <img src="images/ikigai.png">
        <div class="description">
            <pre>Ikigai
</pre>
            <p>350</p>
        </div>
        <div class="btn">
            <a href="#" class=" btn-warning">Add To Cart</a>
            <a href="#" class=" btn-primary" class="a2">Buy</a>
        </div>
    </div> --}}
    {{-- fourth book --}}

</div>

<div class="sub-header2">
    <h1>Love</h1>
</div>
<div class="new-arrival2">
    {{-- first book --}}
    @foreach($love_books as $item)
    <div class="book2">
        @if ($item->image)
                    <img src="{{asset('images/'.$item->image)}}" style="width: 150px;height:150px">
                    @else
                       <img src="#">
                    @endif
        <div class="description">
            <pre>{{$item->Title}}<br>
            </pre>
            <p>{{$item->Price}}</p>
        </div>
        <div class="btn">
            {{-- <a href="#" class=" btn-warning">Add To Cart</a> --}}
            <a href="{{route('front.product',$item->id)}}" class=" btn-primary" class="a2">View Detail</a>
        </div>
    </div>
@endforeach
</div>

<div class="sub-header3">
    <h1>Horror</h1>
</div>
<div class="new-arrival3">
    {{-- first book --}}
    @foreach($horror_books as $item)
    <div class="book3">
        @if ($item->image)
                    <img src="{{asset('images/'.$item->image)}}" style="width: 150px;height:150px">
                    @else
                       <img src="#">
                    @endif
        <div class="description">
            <pre>{{$item->Title}}<br>
            </pre>
            <p>{{$item->Price}}</p>
        </div>
        <div class="btn">
            {{-- <a href="#" class=" btn-warning">Add To Cart</a> --}}
            <a href="{{route('front.product',$item->id)}}" class=" btn-primary" class="a2">View Detail</a>
        </div>
    </div>
@endforeach
</div>
 {{-- FOR FOOTER --}}
 {{-- @extends('layouts.footer')
 @section('footer')
 @endsection --}}

 @endsection
