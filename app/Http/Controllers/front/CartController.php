<?php

namespace App\Http\Controllers\front;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){
        // dd($id);
        // $book_data=Book::where('id',$id)->get();
        // $categoryid=Book::where('id',$id)->pluck('CategoryID');
        // $categories = Category::where('id',$categoryid)->pluck('CategoryName');
        // dd($categories);
        // dd($book_data->image);
        // dd($book_data);
        return view('Front.shop.cart');
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
}
