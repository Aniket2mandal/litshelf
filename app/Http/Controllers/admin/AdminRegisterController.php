<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function index(){
        return view('Admin.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|min:8|same:password',
            ]);
// dd($request);
            $user_data=new User();
        $user_data->name=$request->name;
        $user_data->email=$request->email;
        $user_data->password= Hash::make($request->password);
            $user_data->save();


      // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
      return redirect()->route('admin.login')->with('success','user registered sucessfully');
    }

}
