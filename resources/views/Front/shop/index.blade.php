@extends('Front.layouts.nav')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="{{asset('css/productpage/index.css')}}">
@section('content1')
    {{-- {{$item->id}}
{{$item->Title}}
{{$item->Author}}
{{$item->Price}} --}}

    <div class="products">
        @foreach ($book_data as $item)
            <div class="products-image">
                @if ($item->image)
                    <img src="{{ asset('images/' . $item->image) }}">
                @else
                    <img src="#">
                @endif
            </div>
            <div class="products-details">
                <div class="catlist">

                    <p>
                        @foreach ($categories as $categoryname)
                            {{-- {{$categories[$a]->CategoryName}} --}}
                            {{-- AFTER USING PLUCK FUNCTION --}}
                            {{ $categoryname }}
                        @endforeach >
                        {{ $item->Title }}
                    </p>
                </div>
                <div class="products-name">
                    <h1>{{ $item->Title }}</h1>
                    <h1 id="price">{{ $item->Price }}</h1>
                    <input type="hidden" id="productid" name="productid" value="{{ $item->id }}">
                    <input type="hidden" id="total-price" name="price" value="{{ $item->Price }}">
                    <input type="hidden" id="user-id" value="{{ auth()->user()->id }}">
                </div>


                <div class="piece">
                    <select class="select" id="quantity"name="quantity" required>
                        <option disabled>Select Quantity</option>
                        {{-- @endphp --}}
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    {{-- <p id="totalprice">{{$item->price}}</p> --}}
                </div>

                {{-- <h1 id="total-price">Total Price : </h1> --}}
                {{-- <input type="hidden" id="price" name="price" value="{{$item->price}}"> --}}
                <button class="btn-cart" id="addtocart">Add To Cart</button>
                {{-- <button class="btn-cart">Add To Cart</button> --}}


                <p class="info">Delivery 3-4 days | delivery charge rs 100 | Free return and exchange</p>
                <p class="overview">Overview</p>
                <p class="description-product">{{ $item->Description }}</p>
                <div class="short-image">
                    {{-- <img src=""> --}}
                    @if ($item->image)
                        <img src="{{ asset('images/' . $item->image) }}">
                    @else
                        <img src="#">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('#quantity').change(function(e) {
            e.preventDefault();

            let quantity = document.getElementById('quantity').value;
            let price = document.getElementById('total-price').value;
            let totalprice = quantity * price;
            console.log(quantity + price);
            // console.log(totalprice);
            document.getElementById('price').innerText = totalprice + '.00';

        });
    });

    $(document).ready(function() {
        $('#addtocart').click(function(e) {
            e.preventDefault();

            let quantity = document.getElementById('quantity').value;
            // let price = document.getElementById('total-price').value;
            let book_id = document.getElementById('productid').value;
            let user_id = document.getElementById('user-id').value;
            // console.log(quantity+price+productid+userid);
            $.ajax({
                url: "{{ route('pricestore') }}", // The URL to your controller method
                type: 'POST',
                data: {
                    quantity: quantity,
                    // price: price,
                    book_id: book_id,
                    user_id: user_id,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    console.log(response)
                    if (response) {
                        Swal.fire({
                            title: "Success!",
                            text: "Product added to cart",
                            icon: "success"
                        });

                        // Update cart notification
                        let cartNotification = $('#cart-notification');
                        let currentCount = parseInt(cartNotification.text());
                        let newCount = currentCount + parseInt(quantity);

                        cartNotification.text(newCount);
                        cartNotification.show();

                        // location(response.data)
                    }

                },
                error: function(xhr, error) {
                    Swal.fire({
                        title: "Failed!",
                        text: "failed to add",
                        icon: "error"
                    });
                    $('input').val('');
                }

            });

        });
    });
</script>
