@extends('Front.layouts.nav')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content1')
<div class="success">
    @if(session('success'))
    <div class='alert-success'>{{session('success')}}</div>
   @endif
  </div>
  <div class="error">
    @if(session('error'))
    <div class='alert-danger'>{{session('error')}}</div>
   @endif
  </div>
    <div class="cartdiv">
        <div class="productside">
            <div class="items">

                @foreach ($books as $book)
                    <div class="item-row">
                        <!-- Book Image -->
                        <img src="/css/raw/cross.png" class="cross">
                        <input type="hidden" class="user-id" value="{{ $book['book_id'] }}">
                        <input type="hidden" id="cart-id" value="{{ $book['id'] }}">
                        <div class="imagemain">
                            <img src="{{ asset('images/' . $book['image']) }}" class="image" alt="Book Image">
                        </div>

                        <!-- Details -->
                        <div class="details">
                            <p>{{ $book['Title'] }}</p>
                            <p id="price">{{ $book['price'] }} </p>
                        </div>

                        <!-- Quantity and Buttons -->
                        <div class="quantity-group">
                            <button class="sub">-</button>
                            <div class="quantity" id="quantity">{{ $book['quantity'] }}</div>
                            <button class="add">+</button>
                        </div>

                        <!-- Total Price -->
                        <div class="price">
                            <p id="total-price">{{ $book['total_price'] }} </p>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="paymentside">
            <div class="totalamount">
                <div class="upperpart">
                    <div class="para">
                        <p>Sub Total</p>
                        <p>Shipping</p>
                    </div>
                    <div class="price">
                        <p id="grand-total">2000</p>
                        <p id="delivery"></p>
                    </div>
                </div>
                <hr>
                <div class="lowerpart">
                    <div class="para2">
                        <p>Total</p>

                    </div>
                    <div class="price2">
                        <p id="finalprice"></p>
                    </div>
                </div>
            </div>

            <div class="address">

            </div>
            <div class="button">
                <div class="cashondelivery">
                    <button class="cash-btn">Cash on Delivery</button>
                </div>
                <div class="esewa">
                    {{-- <a class="esewa-btn" href="" id="payWithEsewa">Esewa</a> --}}
                    <button class="esewa-btn"  id="payWithEsewa">Esewa</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            if ($('.items').children().length === 0) {
                // Add "No Cart Added" text to .productside div
                $('.productside').text('Nothing in Cart');
            }
            $('.add').click(function(e) {
                e.preventDefault();

                let quantityDiv = $(this).closest('.quantity-group').find('#quantity');
                let newquantity = parseInt(quantityDiv.text()) + 1;
                console.log(newquantity);
                quantityDiv.text(newquantity);

                let price = $(this).closest('.quantity-group').siblings('.details').find('#price').text();
                console.log(price);

                let totalprice = newquantity * price;
                // console.log(quantity + price);
                console.log(totalprice);

                $(this).closest('.item-row').find('#total-price').text(totalprice);
                updateGrandTotal();
            });

            $('.sub').click(function(e) {
                e.preventDefault();

                let quantityDiv = $(this).closest('.quantity-group').find('#quantity');
                let newquantity = parseInt(quantityDiv.text()) - 1;
                console.log(newquantity);
                quantityDiv.text(newquantity);

                let price = $(this).closest('.quantity-group').siblings('.details').find('#price').text();
                console.log(price);

                let totalprice = newquantity * price;
                // console.log(quantity + price);
                console.log(totalprice);
                $(this).closest('.item-row').find('#total-price').text(totalprice);
                updateGrandTotal();
            });
            updateGrandTotal();

            function updateGrandTotal() {
                let grandTotal = 0;
                let delivery=0;
                // Loop through each row and sum the total prices
                $('.item-row').each(function() {
                    let rowTotal = parseFloat($(this).find('#total-price')
                        .text()); // Get the total price of this row
                    grandTotal += rowTotal;

                    delivery=100;// Add it to the grand total
                });
                // Update the grand total displayed in the #grand-total element
                $('.price #grand-total').text(grandTotal);
                 $('.price #delivery').text(delivery);
                // let delivery = parseFloat($('#delivery').text());
                console.log(delivery);
                let finalprice = grandTotal + delivery;
                $('.price2 #finalprice').text(finalprice);
                // console.log(finalprice);
            }

            $('.cross').click(function(e) {
                e.preventDefault();
                let id = $(this).closest('div').find('#cart-id').val();
                console.log(id);
                let url = "{{ route('pricedelete', ':id') }}".replace(':id', id);
                console.log(url);
                let cartItem = $(this).closest('.item-row');
                $.ajax({
                    url: url, // The URL to your controller method
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function(response) {
                        console.log(response)
                        if (response) {
                            Swal.fire({
                                title: "Success!",
                                text: "Product removed from cart",
                                icon: "success"
                            });

                            cartItem.remove();
                            updateGrandTotal();
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
        $('#payWithEsewa').click(function(e) {
    e.preventDefault();
    let shipping=$('#delivery').text();
    let price=$('#grand-total').text();

     let book_id=$('.user-id').val();
     console.log(book_id);
    let BookIds = [];
    $('.user-id').each(function() {

    let book_id=$(this).val();
    BookIds.push(book_id);
});
console.log(BookIds);

let quantity=[];
$('.quantity').each(function() {
    // let book_id=$('.user-id').val();
    let Quantity=$(this).text();
    quantity.push(Quantity);
});
console.log(quantity);

    let quantityDiv = $('.quantity-group #quantity').text();
    console.log(quantityDiv);
    // console.log(book_id);
    console.log(price);
    // window.location.href = `/account/payment/${phttps://uat.esewa.com.np/epay#/rice}`;  // Redirect to the new URL
//     let url = `/account/payment?price=${encodeURIComponent(price)}&shipping=${encodeURIComponent(shipping)}`;
//     window.location.href = url;
// });

$.ajax({
        url: '/account/payment', // URL to send the request to
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token for Laravel
            shipping: shipping,
            price: price,
            book_id:BookIds,
            Quantity:quantity
        },
        success: function(response) {
            if (response.redirect_url) {
                window.location.href = response.redirect_url;
            } else {
                console.error('No redirect URL provided');
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });

});
    </script>
@endsection
