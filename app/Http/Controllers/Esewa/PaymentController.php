<?php

namespace App\Http\Controllers\Esewa;

use Str;
use Auth;
use App\Models\Cart;
use GuzzleHttp\Client;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        // dd($request->);
        // Set success and failure callback URLs.
        $successUrl = route('payment-success');
        // $successUrl = route('payment-success', $request->book_id);
        $failureUrl = 'https://example.com/failed.php';

        // Initialize eSewa client for development.
// $esewa = new Client([
//     'merchant_code' => 'EPAYTEST',
//     'success_url' => $successUrl,
//     'failure_url' => $failureUrl,
// ]);
        $user_id = Auth::user()->id;
        $transaction_id = Auth::user()->id . Str::random(12);
        $totalPrice = $request->price;
        $Quantity = $request->Quantity;
        // dd($Quantity);
        $shipping = $request->shipping;
        $totalAmount = $totalPrice + 15 + 80 + $shipping;
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
            'tAmt' => $totalAmount,
        ]);

        $redirectUrl = $paymentUrl . '?' . $queryParams;
        // dd($redirectUrl);
        $payment = new Payment();
        $payment->user_id = $user_id;
        $payment->transaction_id = $transaction_id;
        $payment->status = 'pending';
        $payment->totalAmount = $totalAmount;
        $payment->Quantity = json_encode($Quantity);
        $payment->save();
        // dd($request->book_id);
        // $redirectUrl =$esewa->payment($transaction_id, $totalPrice, 15, 80, $shipping);
        foreach ($request->book_id as $index => $bookId) {
            if (\DB::table('books')->where('id', $bookId)->exists()) {
                \DB::table('payment_books')->insert([
                    'payment_id' => $payment->id,
                    'book_id' => $bookId,
                    'quantity' => $Quantity[$index], // Ensure quantities are in the same order as book_ids
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Handle case where book does not exist
                return response()->json(['error' => 'One or more books are invalid.'], 400);
            }
        }


        return response()->json(data: ['redirect_url' => $redirectUrl]);

    }
    // Handle the response as needed

    public function success(Request $request)
    {

        // Redirect to the account index page without query parameters
// dd($id);
        $transaction_id = $request->get('oid');
        // dd($transaction_id);
        $payment = Payment::where('transaction_id', $transaction_id)->first();
        if ($payment) {
            $payment->update(['status' => 'completed']);
        }
        $cart_del = Cart::all();

        // dd($cart_del);
// dd($cart_del);

        if ($cart_del) {
            // If found, delete the cart
            foreach ($cart_del as $cart_item) {
                $cart_item->delete();
            }
            // return $request;
            return redirect()->route('cart.page')->with('success', 'Payment Sucessfull');
        }

    }

    public function failed(Request $request)
    {

        $transaction_id = $request->get('oid');

        $payment = Payment::where('transaction_id', $transaction_id)->first();
        if ($payment) {
            $payment->update(['status' => 'failed']);
        }
        // return $request;
        return redirect()->route('cart.page')->with('error', 'Payment Failed');
    }

}
