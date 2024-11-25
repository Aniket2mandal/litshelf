<?php

namespace App\Http\Controllers\Esewa;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use RemoteMerge\Esewa\Client;
use Str;

class PaymentController extends Controller
{
public function pay($totalPrice){
    // dd($request->tax);
    // Set success and failure callback URLs.
$successUrl = 'http://127.0.0.1:8000/account/index';
$failureUrl = 'https://example.com/failed.php';

// Initialize eSewa client for development.
$esewa = new Client([
    'merchant_code' => 'EPAYTEST',
    'success_url' => $successUrl,
    'failure_url' => $failureUrl,
]);

$unqUserId = Auth::user()->id . Str::random(12);

$esewa->payment('P101W201', $totalPrice, 15, 80, 50);

}
// Handle the response as needed
}
