<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/category', function(){
    return view('category');
});

Route::get('/interestcheck', function(){
    return view('interestcheck');
});

Route::get('/groupbuy', function(){
    return view('groupbuy');
});

Route::get('/productdetail', function(){
    return view('productdetail');
});

Route::get('/profilebuyer', function(){
    return view('profilebuyer');
});

Route::get('/profileseller', function(){
    return view('profileseller');
});
Route::get('/uploadproduct', function(){
    return view('upload');
});
Route::get('/interestcheckdetail', function(){
    return view('interestcheckdetail');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
