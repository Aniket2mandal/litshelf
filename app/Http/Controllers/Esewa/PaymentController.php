<?php

namespace App\Http\Controllers\Esewa;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use RemoteMerge\Esewa\Client;
use Str;

class PaymentController extends Controller
{
public function pay(Request $request){
    // dd($request->tax);
    // Set success and failure callback URLs.
$successUrl = route('payment-success');
$failureUrl = 'https://example.com/failed.php';

// Initialize eSewa client for development.
$esewa = new Client([
    'merchant_code' => 'EPAYTEST',
    'success_url' => $successUrl,
    'failure_url' => $failureUrl,
]);

$transaction_id = Auth::user()->id . Str::random(12);
$totalPrice=$request->price;
$shipping=$request->shipping;
$paymentUrl = 'https://uat.esewa.com.np/epay/main';
$queryParams = http_build_query([
    'scd' => 'EPAYTEST',
    'su' => $successUrl,
    'fu' => $failureUrl,
    'pid' => $transaction_id,
    'amt' => $totalPrice,
    'txAmt' => 15,
    'psc' => 80,
    'pdc' => $shipping,
    'tAmt' => $totalPrice + 15 + 80 + $shipping,
]);

$redirectUrl = $paymentUrl . '?' . $queryParams;
// $redirectUrl =$esewa->payment($transaction_id, $totalPrice, 15, 80, $shipping);

 return response()->json(data: ['redirect_url' => $redirectUrl]);
}
// Handle the response as needed

public function success(Request $request){

        // Redirect to the account index page without query parameters
        return redirect()->route(route: 'front.index');

}

public function failed(){

}

}
