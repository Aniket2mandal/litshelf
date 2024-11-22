<?php

namespace App\Http\Controllers\Esewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nujan\Esewa\Esewa;

class PaymentController extends Controller
{
public function pay(){

  $esewa = new Esewa();

 $data = [
    'amount' => 100,
    'tax_amount' => 10,
    'total_amount' => 110,
    'transaction_uuid' => uniqid(mt_rand(), true),
    'product_code' => 'EPAYTEST',
    'product_service_charge' => 0,
    'product_delivery_charge' => 0,
    'success_url' => 'http://review.test/esewa/success',
    'failure_url' => 'https://google.com',
    'signed_field_names' => 'total_amount,transaction_uuid,product_code',
];

$response = $esewa->sendPaymentRequest($data);
}
// Handle the response as needed
}
