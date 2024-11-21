
@extends('Admin.layouts.app')
@section('content')

<h1>Dashboard</h1>
<div class="sales">
    <div class="total-orders">
        <h1 style="margin: 10px 20px 0px; padding: 0;">150</h1>
        <p style="margin: 5px 20px 0px; padding: 0;">Total Orders</p>
        <a href="#">View more</a>
    </div>
    <div class="total-customers">
        <h1 style="margin: 10px 20px 0px; padding: 0;">50</h1>
        <p style="margin: 5px 20px 0px; padding: 0;">Total Customers</p>
        <a href="#">View more</a>
    </div>
    <div class="total-sales">
        <h1 style="margin: 10px 20px 0px; padding: 0;">$1500</h1>
        <p style="margin: 5px 20px 0px; padding: 0;">Total Sales</p>
        <a href="#">View more</a>
    </div>
</div>



@endsection
