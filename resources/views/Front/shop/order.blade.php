@extends('Front.layouts.nav')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('content1')
<div class="content">
@foreach($payment as $item)
<div class="order-card">
<!-- Header -->
<div class="order-header">
  <div class="username">Payment Status</div>
  <div class="status">{{$item->payment->status}}</div>
</div>
<hr>
<!-- Product Details -->
<div class="product-details">
  <div class="product-image">
    <img src="{{ asset('images/' . $item->book->image) }}" alt="Product Image">
  </div>
  <div class="product-info">
    <div class="titles">
        <h4>{{$item->book->Title}}</h4>
    <div class="details">{{$item->book->Description}}
        <span class="see-more" onclick="toggleDetails(this)">See More</span>
    </div>
    </div>

    <div class="price">Rs. {{$item->book->Price}}</div>
    <div class="quantity"> Qty: {{$item->quantity}}</div>
  </div>
</div>
</div>
</div>
@endforeach
<script>
    function toggleDetails(element) {
        const details = element.parentElement;
    // Check if the content is already expanded
    if (details.classList.contains('expanded')) {
        // Collapse the content and change text to "See More"
        details.classList.remove('expanded');
        element.textContent = 'See More';
    } else {
        // Expand the content and change text to "See Less"
        details.classList.add('expanded');
        element.textContent = 'See Less';
    }
    }
</script>
@endsection
