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



Route::get('/category', function(){
    return view('category');
});

Route::get('/interestcheck', function(){
    return view('interestcheck');
});


Route::get('/home', function(){
    return view('home');
});
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/do_addcomment', [App\Http\Controllers\ProductCommentController::class, 'store']);
Route::post('/do_upload', [App\Http\Controllers\ProductDetailController::class, 'store']);
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::group(['middleware'=>['checklogin']],function(){

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
    Route::get('/interestcheckdetail', function(){
        return view('interestcheckdetail');
    });
    Route::get('/productverification', function(){
        return view('productverification');
    });
});

// To do list
// Bikin Halaman Verification
// Bikin Logic Backend Verification
// Bikin Backend Verification
// Bikin Halaman interest check list
// Tampilin daftar produk interest check list pakai database
// Bikin timer(?) untuk menghitung waktu sisa interest check list
// Bikin Middleware untuk menghitung waktu sisa interest check list, jika waktu habis maka Update status InterestDone jadi 1, etc



