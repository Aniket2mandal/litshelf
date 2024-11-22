@extends('Front.layouts.nav')

@section('content1')
<div class="cartdiv">
    <div class="productside">

    </div>
    <div class="paymentside">
        <div class="totalamount">
            <div class="upperpart">
<div class="para">
<p>Sub Total</p>
<p>Shipping</p>
</div>
<div class="price">
    <p>2000</p>
    <p>100</p>
    </div>

</div>
<hr>
        </div>

        <div class="address">

        </div>
        <div class="button">
            <div class="cashondelivery">
                <button class="cash-btn">Cash on Delivery</button>

            </div>
            <div class="esewa">
                <a href="{{route('esewapay')}}" class="esewa-btn" >Esewa</a>
            </div>
        </div>
    </div>
</div>
@endsection
