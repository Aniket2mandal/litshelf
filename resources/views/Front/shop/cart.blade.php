@extends('Front.layouts.nav')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content1')
    <div class="cartdiv">
        <div class="productside">
            <div class="items">

                @foreach ($books as $book)
                    <div class="item-row">
                        <!-- Book Image -->
                        <img src="/css/raw/cross.png" class="cross">
                        <input type="hidden" id="user-id" value="{{ $book['id'] }}">
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
                        <p id="delivery">100</p>
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

                // Loop through each row and sum the total prices
                $('.item-row').each(function() {
                    let rowTotal = parseFloat($(this).find('#total-price')
                        .text()); // Get the total price of this row
                    grandTotal += rowTotal; // Add it to the grand total
                });
                // Update the grand total displayed in the #grand-total element
                $('.price #grand-total').text(grandTotal);

                let delivery = parseFloat($('#delivery').text());
                console.log(delivery);
                let finalprice = grandTotal + delivery;
                $('.price2 #finalprice').text(finalprice);
                // console.log(finalprice);
            }

            $('.cross').click(function(e) {
                e.preventDefault();
                let id = $(this).next('input[type="hidden"]').val();
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
    let tax=2000;
    let price=$('#finalprice').text();
    console.log(price);
    window.location.href = `/account/payment/${price}`;  // Redirect to the new URL
});
    </script>
@endsection
