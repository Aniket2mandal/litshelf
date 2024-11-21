<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index(){
//         echo "HELLO THIS IS ADMIN DASHBOARD";
//         $admin=Auth::guard('admin')->user();
// echo $admin->name.'<a href="'.route('admin.logout').'">Logout</a>';
return view('Admin.dashboard');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')
        ->with('success','User Logedout sucessfully');
    }
}
