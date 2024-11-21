<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        // if(Auth::user()->name=="Admin"){
        //     return view
        // }
         return view('profile');
        // echo '<a href="'.route('logout').'">Logout</a>';
    }



}
