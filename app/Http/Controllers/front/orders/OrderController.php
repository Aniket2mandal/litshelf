<?php

namespace App\Http\Controllers\front\orders;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Category;
use App\Models\PaymentBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {


        // $payment = Payment::with(['paymentbook.book'])->where('status', 'completed')
        //     ->orWhere('status', 'failed')
        //     ->get();
        $payment=PaymentBook::with('book','payment')->whereHas('payment',function($query){
            $query->where('status','!=','pending');
        })->get();


// dd($payment);
        // foreach ($payment->paymentbook as $paymentBook) {
        //     $book = $paymentBook->book;
        //     $quantity = $paymentBook->quantity;
        //     // $status = $paymentBook->status;
        //     echo "Book Title: " . $book->Title . "\n";
        //     echo "Quantity: " . $quantity . "\n";
        //     // echo "Payment Status: " . $status . "\n";
        // }
        return view('Front.shop.order',compact('payment'));
    }
}
