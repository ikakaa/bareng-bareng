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
    Route::group(['middleware'=>['checkinterestfinish']],function(){
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

    Route::get('/groupbuy',[App\Http\Controllers\GroupBuyController::class, 'index']);

    Route::get('/productapprove/{id}', [App\Http\Controllers\ProductDetailController::class, 'approveproduct']);

    Route::post('/rejectproduct', [App\Http\Controllers\ProductDetailController::class, 'rejectproduct']);

    Route::get('/product/{id}',[App\Http\Controllers\ProductDetailController::class, 'detail']);

    Route::get('/edit/{id}',[App\Http\Controllers\ProductDetailController::class, 'edit']);

    Route::get('/interestcheckdetail/{id}',[App\Http\Controllers\InterestCheckController::class, 'detail']);

    Route::get('/productverification',[App\Http\Controllers\ProductDetailController::class, 'index']);

    Route::get('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);
    Route::post('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);

    Route::get('/cart', [App\Http\Controllers\ProductDetailController::class, 'cart']);

    Route::get('/myproductlist', [App\Http\Controllers\ProductDetailController::class, 'myproductlist']);

    Route::get('/productverificationlist', [App\Http\Controllers\ProductDetailController::class, 'productverificationlist']);

    Route::get('/payment', [App\Http\Controllers\ProductDetailController::class, 'payment']);
    Route::post('/makeorder', [App\Http\Controllers\ProductDetailController::class, 'makeorder']);

    Route::get('/uploadproof', function(){
        return view('uploadproof');
    });
    Route::patch('/uploadproof/{id}', [App\Http\Controllers\ProductDetailController::class, 'uploadproof']);

    Route::get('/paymentverification',[App\Http\Controllers\ProductDetailController::class, 'paymentverification']);
    Route::get('/paymentapprove/{id}', [App\Http\Controllers\ProductDetailController::class, 'paymentapprove']);
    Route::get('/paymentreject/{id}', [App\Http\Controllers\ProductDetailController::class, 'paymentreject']);

    Route::get('/orderhistory', [App\Http\Controllers\ProductDetailController::class, 'orderhistory']);

    Route::get('/orderhistory2', [App\Http\Controllers\ProductDetailController::class, 'orderhistory2']);

    Route::get('/editdetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'editdetail']);
    Route::patch('/editdetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'updatedetail']);
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



