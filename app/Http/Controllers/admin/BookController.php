<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(){
        $books=Book::with('category')->get();
        // $categoryIds = $books->pluck('CategoryID');
        // $categoryIdsArray = array_values($categoryIds->toArray());
// dd($categoryIds);
        // dd($categoryIdsArray);
        // dd($categoryIds);
        // dd($books);
        // $categories = Category::whereIn('id',$categoryIds)->with('category')->pluck('CategoryName');
        // $categories=Category::whereIn('id',$categoryIds)->pluck('CategoryName');
        //  dd($categories);
        // dd($categories);
        // $categories = Category::whereIn('id', $categoryIds)->get();
 return view('Admin.Books.index',compact('books'));
    }
    public function create(){
        $categories=Category::all();
return view('Admin.Books.create',compact('categories'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'Title' => 'required|string|max:255',
            'Author' => 'required|string|max:255',
            'PublishDate' => 'required|date',
            'Price' => 'required|numeric',
            'Description' => 'required|string',
            'CategoryId' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Handle the image upload
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            }

            // Create a new book instance and set its properties
            $book = new Book();
            $book->Title = $request->Title;
            $book->Author = $request->Author;
            if ($imageName) {
                $book->image = $imageName;
            }
            $book->PublishDate = $request->PublishDate;
            $book->Price = $request->Price;
            $book->Description = $request->Description;
            $book->CategoryId = $request->CategoryId;

            // Save the book to the database
            $book->save();

            // Redirect to the books index page with a success message
            return redirect()->route('books.index')->with('success','Book'."\t". $book->Title ."\t".' added successfully');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error storing book: ' . $e->getMessage());

            // Redirect back to the create page with an error message
            return redirect()->route('books.create')->withErrors(['error',$book->Title ."\t". 'An error occurred while adding the book.']);
        }
    }


    public function edit(){

    }
    public function update(){

    }
    public function delete($id){
        $book_del=Book::where('id',$id)->first();

        // Check if the category was found
        if ($book_del) {
            // If found, delete the category
            $book_del->delete();
            return redirect()->route('books.index')->with('success','Book'. "\t".$book_del->Title ."\t".' deleted successfully!');
        } else {
            // If not found, redirect back with an error message
            return redirect()->route('categories.index')->with('error', 'Category not found!');
        }
    }
}
