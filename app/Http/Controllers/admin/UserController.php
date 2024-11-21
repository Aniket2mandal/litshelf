<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('Admin.User.index',compact('users'));
    }
    public function create(){
        return view('Admin.User.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'role'=>'required',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|min:8|same:password',
            ]);
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->role=$request->role;
            $user->password= Hash::make($request->password);
            $user->save();
              // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
              return redirect()->route('users.index')->with('success','User'."\t".$user->name ."\t".' created sucessfully');
    }


    public function delete($id){
        $user_del=User::where('id',$id)->first();

        // Check if the category was found
        if ($user_del) {
            // If found, delete the category
            $user_del->delete();
            return redirect()->route('users.index')->with('success','User'."\t".$user_del->name ."\t". ' deleted successfully!');
        } else {
            // If not found, redirect back with an error message
            return redirect()->route('users.index')->with('error',$user_del->name ."\t". ' not found!');
        }
    }

    public function edit($id){
        $user=User::find($id);
        return view('Admin.User.edit',compact('user'));
       }

       public function update(Request $request,$id){
        $request->validate([
           'name'=>'required|string',
            'email'=>'required|string',
            'role'=>'required',
            ]);
            // echo $request->CategoryName;
            $user_up=User::where('id',$id)->get();
            // SYNTAX variable->table_column_name =$request->form_input_name
            foreach($user_up as $user){
                $user->name=$request->name;
                $user->email=$request->email;
                $user->role=$request->role;
                $user->save();

            }
            //
      // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
      return redirect()->route('users.index')->with('success','User'."\t".$user->name ."\t".'information updated sucessfully');
       }
}
