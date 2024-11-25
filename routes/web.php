<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;


use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\front\CartController;

use App\Http\Controllers\front\ShopController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\Esewa\PaymentController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\front\FrontHomeController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\front\UserProfileController;
use App\Http\Controllers\admin\AdminRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// FRONT
Route::get('/', [FrontController::class, 'index'])->name('front.home');

Route::group(['prefix'=>'account'],function(){
 Route::group(['middleware'=>'guest'],function(){
   Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
   Route::post('/admin/process_register', [AdminRegisterController::class, 'register'])->name('admin.process_register');

    });
 Route::group(['middleware'=>'auth'],function(){
    Route::get('/logout', [FrontHomeController::class, 'logout'])->name('front.logout');
    Route::get('/index', [FrontHomeController::class, 'index'])->name('front.index');
    Route::get('/product/{id}', [ShopController::class, 'index'])->name('front.product');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.page');
    Route::post('/pricestore', [CartController::class, 'store'])->name('pricestore');
    Route::post('/pricedelete/{id}', [CartController::class, 'delete'])->name('pricedelete');
    Route::get('profile',[UserProfileController::class,'index'])->name('user.profile');
    Route::get('payment',[PaymentController::class,'pay'])->name('esewapay');

    });
});



Auth::routes();



Route::group(['prefix'=>'admin'],function(){
  Route::group(['middleware'=>'admin.guest'],function(){
    Route::get('/register', [AdminRegisterController::class, 'index'])->name('admin.register');
    Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

  });
  Route::group(['middleware'=>'admin.auth'],function(){
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminHomeController::class, 'logout'])->name('admin.logout');


    // CATEGORIES
    Route::get('categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('categories/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');

    // BOOKS
    Route::get('books/index', [BookController::class, 'index'])->name('books.index');
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books/store',[BookController::class,'store'])->name('books.store');
    Route::get('books/edit/{id}',[BookController::class,'edit'])->name('books.edit');
    Route::post('books/update/{id}',[BookController::class,'update'])->name('books.update');
    Route::get('books/delete/{id}',[BookController::class,'delete'])->name('books.delete');


    // USERS
    Route::get('user/index', [UserController::class, 'index'])->name('users.index');
    Route::get('user/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store',[UserController::class,'store'])->name('users.store');
    Route::get('users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::post('users/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::get('users/delete/{id}',[UserController::class,'delete'])->name('users.delete');

    Route::get('profile',[ProfileController::class,'index'])->name('admin.profile');

  });
});
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/profile', [UserController::class, 'index'])->name('profile');


// Route::get('/',[AboutController::class,'index'])->name('index');
// Route::get('/about',[AboutController::class, 'about'])->name('about');
// Route::get('/logout', [UserController::class, 'logout'])->name('logout');
