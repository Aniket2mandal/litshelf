<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        // if(Auth::user()->name=="Admin"){
        //     return view
        // }
        return view('profile');
    }
}
