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

Route::get('/interestcheck',[App\Http\Controllers\InterestCheckController::class, 'index']);
Route::get('/interestcheckdetail/{id}',[App\Http\Controllers\InterestCheckController::class, 'detail']);

Route::get('/groupbuy',[App\Http\Controllers\GroupBuyController::class, 'index']);
Route::get('/product/{id}',[App\Http\Controllers\ProductDetailController::class, 'detail']);

Route::get('/home', function(){
    return view('home');
});
Auth::routes();

Route::post('/do_addcomment/{id}', [App\Http\Controllers\ProductCommentController::class, 'store']);
Route::post('/do_upload', [App\Http\Controllers\ProductDetailController::class, 'store']);
Route::post('/do_editprofile', [App\Http\Controllers\Auth\LoginController::class, 'do_editprofile']);
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::group(['middleware'=>['checklogin']],function(){
    Route::group(['middleware'=>['checkinterestfinish']],function(){

    Route::get('/cart', [App\Http\Controllers\ProductDetailController::class, 'cart']);


    Route::get('/profilebuyer', function(){
        return view('profilebuyer');
    });

    Route::get('/profileseller', function(){
        return view('profileseller');
    });

    Route::get('/editprofile',[App\Http\Controllers\Auth\LoginController::class, 'editprofile']);
    

    //seller
    Route::get('/uploadproduct', function(){
        return view('upload');
    });

    Route::get('/edit/{id}',[App\Http\Controllers\ProductDetailController::class, 'edit']);
    Route::get('/editdetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'editdetail']);
    Route::patch('/editdetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'updatedetail']);

    Route::get('/myproductlist', [App\Http\Controllers\ProductDetailController::class, 'myproductlist']);

    Route::get('/productverificationlist', [App\Http\Controllers\ProductDetailController::class, 'productverificationlist']);

    Route::get('/productverification',[App\Http\Controllers\ProductDetailController::class, 'index']);

    //buyer
    Route::get('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);
    Route::post('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);

    Route::get('/payment', [App\Http\Controllers\ProductDetailController::class, 'payment']);
    Route::post('/makeorder', [App\Http\Controllers\ProductDetailController::class, 'makeorder']);
    Route::get('/uploadproof', function(){
        return view('uploadproof');
    });
    Route::patch('/uploadproof/{id}', [App\Http\Controllers\ProductDetailController::class, 'uploadproof']);

    Route::get('/orderhistory', [App\Http\Controllers\ProductDetailController::class, 'orderhistory']);
    Route::get('/orderhistorydetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'orderhistorydetail']);

    Route::get('/ongoing', [App\Http\Controllers\ProductDetailController::class, 'ongoing']);

});
});

//admin
Route::get('/paymentverification',[App\Http\Controllers\ProductDetailController::class, 'paymentverification'])->middleware('isAdmin');
Route::get('/paymentapprove/{id}', [App\Http\Controllers\ProductDetailController::class, 'paymentapprove'])->middleware('isAdmin');
Route::get('/paymentreject/{id}', [App\Http\Controllers\ProductDetailController::class, 'paymentreject'])->middleware('isAdmin');

Route::get('/productverification',[App\Http\Controllers\ProductDetailController::class, 'index'])->middleware('isAdmin');

Route::get('/productapprove/{id}', [App\Http\Controllers\ProductDetailController::class, 'approveproduct'])->middleware('isAdmin');
Route::post('/rejectproduct', [App\Http\Controllers\ProductDetailController::class, 'rejectproduct'])->middleware('isAdmin');



// To do list
// Bikin Halaman Verification
// Bikin Logic Backend Verification
// Bikin Backend Verification
// Bikin Halaman interest check list
// Tampilin daftar produk interest check list pakai database
// Bikin timer(?) untuk menghitung waktu sisa interest check list
// Bikin Middleware untuk menghitung waktu sisa interest check list, jika waktu habis maka Update status InterestDone jadi 1, etc



