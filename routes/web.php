<?php

use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductDetailsFile;


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

    Route::get('/productdetail', function(){
        return view('productdetail');
    });

    Route::get('/cart', function(){
        return view('cart');
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

    Route::get('/interestcheck',[App\Http\Controllers\InterestCheckController::class, 'index']);

    Route::get('/groupbuy',[App\Http\Controllers\GroupBuyController::class, 'index'])->middleware('checkinterestfinish');

    Route::get('/productapprove/{id}', [App\Http\Controllers\ProductDetailController::class, 'approveproduct']);

    Route::get('/productreject/{id}', [App\Http\Controllers\ProductDetailController::class, 'rejectproduct']);

    Route::get('/product/{id}',[App\Http\Controllers\ProductDetailController::class, 'detail']);

    Route::get('/interestcheckdetail/{id}',[App\Http\Controllers\InterestCheckController::class, 'detail']);

    Route::get('/productverification',[App\Http\Controllers\ProductDetailController::class, 'index']);

    Route::get('/productverificationlist', function(){
        return view('productverificationlist');
    });

    Route::get('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);
    Route::post('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);

    Route::get('/cart', [App\Http\Controllers\ProductDetailController::class, 'cart']);


});

// To do list
// Bikin Halaman Verification
// Bikin Logic Backend Verification
// Bikin Backend Verification
// Bikin Halaman interest check list
// Tampilin daftar produk interest check list pakai database
// Bikin timer(?) untuk menghitung waktu sisa interest check list
// Bikin Middleware untuk menghitung waktu sisa interest check list, jika waktu habis maka Update status InterestDone jadi 1, etc



