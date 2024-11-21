<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   public function index(){
    $category_data=Category::select('id','CategoryName','status')->get();
    return view('Admin.Category.index',compact('category_data'));
   }
   public function create(){
return view('Admin.Category.create');
   }
   public function store(Request $request){
    $request->validate([
        'CategoryName'=>'required|string',
        'status'=>'required|string',
        ]);
        $category=new Category();
        $category->CategoryName=$request->CategoryName;
        $category->status=$request->status;

        $category->save();
          // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
          return redirect()->route('categories.index')->with('success','Category'."\t".$category->CategoryName ."\t".'created sucessfully');
   }
   public function edit($id){
    $category_data=Category::find($id);
    return view('Admin.Category.edit',compact('category_data'));
   }
   public function update(Request $request,$id){
    $request->validate([
        'CategoryName'=>'required|string',
        'status'=>'required|string',

        ]);
        // echo $request->CategoryName;
        $category=Category::where('id',$id)->get();
        // SYNTAX variable->table_column_name =$request->form_input_name
        foreach($category as $data){
        $data->CategoryName=$request->CategoryName;
        $data->status=$request->status;
        $data->save();
        }
        //
  // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
  return redirect()->route('categories.index')->with('success','Category'."\t".$data->CategoryName ."\t".'updated sucessfully');
   }

   public function delete($id){
    $category_del=Category::where('id',$id)->first();

    // Check if the category was found
    if ($category_del) {
        // If found, delete the category
        $category_del->delete();
        return redirect()->route('categories.index')->with('success', 'Category'."\t".$category_del->CategoryName ."\t".' deleted successfully!');
    } else {
        // If not found, redirect back with an error message
        return redirect()->route('categories.index')->with('error', $category_del->CategoryName ."\t". 'not found!');
    }
   }
}
