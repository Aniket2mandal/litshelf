<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(){
        // $user_data=User::
        $user = Auth::user();
        // dd($user->name);
        return view('Front.Profile.index',compact('user'));
    }
}
