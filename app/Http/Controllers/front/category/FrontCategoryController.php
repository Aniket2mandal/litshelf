<?php

namespace App\Http\Controllers\front\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    public function index(){
        return view('Front.shop.category.category');
    }
}
