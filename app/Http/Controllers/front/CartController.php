<?php

namespace App\Http\Controllers\front;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){

        $userId = Auth::id();

        // Fetch cart items for the authenticated user
        $cart = Cart::where('user_id', $userId)->get();

        $books = [];
        if ($cart->isNotEmpty()) {
            $bookIds = $cart->pluck('book_id');

            // Fetch all books in a single query
            $booksData = Book::whereIn('id', $bookIds)->get(['id', 'image', 'Title', 'price']);

            // Combine cart and book data
            foreach ($cart as $cartItem) {
                $book = $booksData->where('id', $cartItem->book_id)->first();
                if ($book) {
                    $books[] = [
                        'book_id' => $book->id,
                        'image' => $book->image,
                        'Title' => $book->Title,
                        'price' => $book->price,
                        'quantity' => $cartItem->quantity,
                        'id' => $cartItem->id,
                        'total_price' => $cartItem->quantity * $book->price,
                    ];
                }
            }
        }

        return view('Front.shop.cart', compact('books', 'cart'));

    }

    public function store(Request $request){

         $request->validate([
            'quantity' => 'required|integer',
            'user_id' => 'required|integer',
            'book_id' => 'required|integer',
        ]);

        $cart=new Cart();
        $cart->user_id=$request->user_id;
        $cart->book_id=$request->book_id;
        $cart->quantity=$request->quantity;
        $cart->save();
        return response()->json(["Sucess"=>true],200);
    }

    public function delete($id){
        // dd($id);
        $cart=Cart::where('id',$id)->first();
        $cart->delete();

        return response()->json(["Sucess" =>true],200);

    }
}
