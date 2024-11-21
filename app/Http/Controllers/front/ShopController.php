<?php

namespace App\Http\Controllers\front;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index($id){
        // dd($id);
        $book_data=Book::where('id',$id)->get();
        $categoryid=Book::where('id',$id)->pluck('CategoryID');
        $categories = Category::where('id',$categoryid)->pluck('CategoryName');
        // dd($categories);
        // dd($book_data->image);
        // dd($book_data);
        return view('Front.shop.index',compact('book_data','categories'));
    }
}
