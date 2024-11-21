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
        $books=Book::take(4)->get();
        $love_books=Book::where('CategoryID','2')->take(4)->get();
        $horror_books=Book::where('CategoryID','1')->take(4)->get();
        return view('Front.index',compact('categories','books','love_books','horror_books'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('front.home')
        ->with('success','User Logedout sucessfully');
    }

}
