@extends('layouts.nav')

@section('content1')
@endsection
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
<link rel="stylesheet" href="css/home.css">
{{-- <link rel="stylesheet" href="css/welcome.css"> --}}
<div class="top-body">

    <img src="images/books.jpg">
    <div class="transparent">
        <pre>Every book is a new
adventure waiting to
be explored.</pre>
        <a href="{{ route('about') }}" class="btn btn-light">Learn more</a>
    </div>
</div>
<div class=category-btn>
    <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Books Category
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>
</div>
<div class="books-header">
    <h1>DISCOVER YOUR NEXT BOOK</h1>
</div>
<div class="sub-header">
    <h1>Our Populars</h1>
</div>
<div class="new-arrival">
    {{-- first book --}}
    <div class="book1">
        <img src="images/dont.jpg">
        <div class="description">
            <pre>I don't Love
you any more</pre>
            <p>350</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>
    </div>

    {{-- second book --}}
    <div class="book2">
        <img src="images/atomic.png">
        <div class="description">
            <pre>Atomic habit
</pre>
            <p>350</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>
    </div>
    {{-- third book --}}
    <div class="book3">
        <img src="images/ikigai.png">
        <div class="description">
            <pre>Ikigai
</pre>
            <p>350</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>
    </div>
    {{-- fourth book --}}
    <div class="book4">
        <img src="images/horror.png">
        <div class="description">
            <pre>Bram Stoker's
Dracula
</pre>
            <p>350</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>

    </div>
</div>


<div class="sub-header2">
    <h1>Love</h1>
</div>
<div class="new-arrival2">
    {{-- first book --}}
    <div class="book1">
        <img src="images/atomic.png">
        <div class="description">
            <pre>Atomic</pre>
            <p>350</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>
    </div>

    {{-- second book --}}
    <div class="book2">
        <img src="images/dont.jpg">
        <div class="description">
            <pre>I don't Love
you any more</pre>
            <p>350</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>
    </div>
    {{-- third book --}}
    <div class="book3">
        <img src="images/horror.png">
        <div class="description">
            <pre>Bram Stoker's Dracula
        </pre>
            <p>350</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>
    </div>
    {{-- fourth book --}}
    <div class="book3">
        <img src="images/ikigai.png">
        <div class="description">
            <pre>Ikigai
        </pre>
            <p>500</p>
        </div>
        <a href="#" class="btn btn-warning">Add To Cart</a>
        <a href="#" class="btn btn-primary" class="a2">Buy</a>
    </div>
</div>

 {{-- FOR FOOTER --}}
 @extends('layouts.footer')
 @section('footer')
 @endsection
