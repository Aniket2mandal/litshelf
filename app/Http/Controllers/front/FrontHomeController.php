<?php

namespace App\Http\Controllers\front;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontHomeController extends Controller
{
    public function index(){
        $categories=Category::where('status','Active')->get();
        // TAKE FUNCTION IS USED TO SELECT ONLY FOUR PRODUCT FROM DATABASE IN
        // $books VARIABLE
        $books=Category::with('book')->take(4)->get();
        $book=Book::with('category')->take(4)->get();
        return view('Front.index',compact('categories','books','book'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('front.home')
        ->with('success','User Logedout sucessfully');
    }

}
