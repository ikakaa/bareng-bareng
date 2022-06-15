<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\StorageController;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductDetailsFile;
use App\Models\User;

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

Route::get('/',[App\Http\Controllers\UserViewController::class, 'home']);

Route::get('/search', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/category', function () {
    return view('category');
});

Route::get('/testrequest', function () {
    return view('testrequest');
});

Route::get('/interestcheck', [App\Http\Controllers\InterestCheckController::class, 'index'])->middleware('checkinterestfinish');
Route::get('/interestcheck/{category}', [App\Http\Controllers\InterestCheckController::class, 'interestcheckcategory'])->middleware('checkinterestfinish');
Route::get('/interestcheckdetail/{id}', [App\Http\Controllers\InterestCheckController::class, 'detail']);
Route::get('/refundetail/{id}', [App\Http\Controllers\RefundRequestController::class, 'refunddetail']);
Route::post('/refundreject', [App\Http\Controllers\RefundRequestController::class, 'refundreject']);
Route::get('/refundapprove/{id}', [App\Http\Controllers\RefundRequestController::class, 'refundapprove']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);

Route::group(['middleware' => ['checkgroupbuy']], function () {
    Route::get('/groupbuy', [App\Http\Controllers\GroupBuyController::class, 'index']);
    Route::get('/groupbuy/{category}', [App\Http\Controllers\GroupBuyController::class, 'groupbuycategory']);
});

Route::get('/product/{id}', [App\Http\Controllers\ProductDetailController::class, 'detail']);
Route::get('/sellerformdetail/{name}', [App\Http\Controllers\SellerVerificationController::class, 'detailform']);

Route::get('/home',[App\Http\Controllers\UserViewController::class, 'home']);
Auth::routes();
Route::get('/editdetail/uploads/{path}/{path2}', [StorageController::class, 'download']);
Route::get('/deleteproductimg/{id}', [App\Http\Controllers\ProductDetailController::class, 'deleteproductimg']);
Route::post('/do_addcomment/{id}', [App\Http\Controllers\ProductCommentController::class, 'store']);
Route::post('/do_upload', [App\Http\Controllers\ProductDetailController::class, 'store']);
Route::post('/do_editprofile', [App\Http\Controllers\Auth\LoginController::class, 'do_editprofile']);
Route::post('/editdetailaddimage', [App\Http\Controllers\ProductDetailController::class, 'editdetailaddimage']);
Route::post('/do_uploadrequestseller', [App\Http\Controllers\SellerVerificationController::class, 'do_uploadrequestseller']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['checklogin']], function () {
    Route::group(['middleware' => ['checkinterestfinish']], function () {

        Route::get('/cart', [App\Http\Controllers\ProductDetailController::class, 'cart']);
        Route::delete('/delete/{id}', [App\Http\Controllers\ProductDetailController::class, 'delete']);


        Route::get('/profilebuyer', function () {
            return view('profilebuyer');
        });

        Route::get('/profileseller', [App\Http\Controllers\OrderController::class, 'fund']);


        Route::get('/editprofile', [App\Http\Controllers\Auth\LoginController::class, 'editprofile']);
        Route::get('/testing', [App\Http\Controllers\UserViewController::class, 'testing']);


        //seller
        Route::get('/uploadproduct', function () {
            return view('upload');
        });

        Route::get('/edit/{id}', [App\Http\Controllers\ProductDetailController::class, 'edit']);
        Route::get('/editdetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'editdetail']);
        Route::patch('/editdetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'updatedetail']);

        Route::get('/myproductlist', [App\Http\Controllers\ProductDetailController::class, 'myproductlist']);
        Route::get('/ongoingseller', [App\Http\Controllers\OrderController::class, 'ongoingseller']);
        Route::post('/itemsent', [App\Http\Controllers\OrderController::class, 'itemsent']);
        Route::get('/ongoingsellerdetail/{id}', [App\Http\Controllers\OrderController::class, 'ongoingsellerdetail']);

        Route::get('/productverificationlist', [App\Http\Controllers\ProductDetailController::class, 'productverificationlist']);

        Route::get('/endgroupbuy/{id}', [App\Http\Controllers\ProductDetailController::class, 'endgroupbuy']);
        Route::get('/productverification', [App\Http\Controllers\ProductDetailController::class, 'index']);
        Route::get('/sellerverification', [App\Http\Controllers\SellerVerificationController::class, 'index']);

        Route::post('/request', [App\Http\Controllers\OrderController::class, 'request']);


        //buyer
        Route::post('/likeproduct', [App\Http\Controllers\LikeController::class, 'likeproduct']);
        Route::get('/dislikeproduct/{id}', [App\Http\Controllers\LikeController::class, 'dislikeproduct']);
        Route::get('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);
        Route::get('/sellerform', [App\Http\Controllers\SellerVerificationController::class, 'sellerform']);
        Route::get('/resetsellerform', [App\Http\Controllers\SellerVerificationController::class, 'resetsellerform']);
        Route::post('/order/{id}', [App\Http\Controllers\ProductDetailController::class, 'order']);
        Route::post('/refundsend', [App\Http\Controllers\RefundRequestController::class, 'refundsend']);
        Route::get('/transactiondetail/{id}', [App\Http\Controllers\OrderController::class, 'transactiondetail']);
        Route::get('/payment', [App\Http\Controllers\ProductDetailController::class, 'payment']);
        Route::post('/makeorder', [App\Http\Controllers\ProductDetailController::class, 'makeorder']);
        Route::get('/uploadproof', function () {
            return view('uploadproof');
        });
        Route::patch('/uploadproof/{id}', [App\Http\Controllers\ProductDetailController::class, 'uploadproof']);
        Route::get('/transactiondone/{id}', [App\Http\Controllers\OrderController::class, 'transactiondone']);
        Route::get('/orderhistory', [App\Http\Controllers\ProductDetailController::class, 'orderhistory']);
        Route::get('/orderhistorydetail/{id}', [App\Http\Controllers\ProductDetailController::class, 'orderhistorydetail']);
        Route::get('/requestlist', [App\Http\Controllers\RefundRequestController::class, 'requestlist']);
        Route::get('/recommendation', [App\Http\Controllers\UserViewController::class, 'recommendation']);
        Route::get('/ongoing', [App\Http\Controllers\ProductDetailController::class, 'ongoing']);
    });
});

//admin
Route::get('/paymentverification', [App\Http\Controllers\ProductDetailController::class, 'paymentverification'])->middleware('isAdmin');
Route::get('/paymentapprove/{id}', [App\Http\Controllers\ProductDetailController::class, 'paymentapprove'])->middleware('isAdmin');
Route::get('/paymentreject/{id}', [App\Http\Controllers\ProductDetailController::class, 'paymentreject'])->middleware('isAdmin');
Route::post('/rejectsellerrequest', [App\Http\Controllers\SellerVerificationController::class, 'rejectsellerrequest'])->middleware('isAdmin');

Route::get('/productverification', [App\Http\Controllers\ProductDetailController::class, 'index'])->middleware('isAdmin');
Route::get('/refundverification', [App\Http\Controllers\RefundRequestController::class, 'refundverification'])->middleware('isAdmin');

Route::get('/productapprove/{id}', [App\Http\Controllers\ProductDetailController::class, 'approveproduct'])->middleware('isAdmin');
Route::get('/sellerrequestapprove/{id}', [App\Http\Controllers\SellerVerificationController::class, 'approveseller'])->middleware('isAdmin');
Route::post('/rejectproduct', [App\Http\Controllers\ProductDetailController::class, 'rejectproduct'])->middleware('isAdmin');

Route::get('/withdrawalrequest', [App\Http\Controllers\OrderController::class, 'withdrawalrequest'])->middleware('isAdmin');
Route::get('/changestatus/{id}', [App\Http\Controllers\OrderController::class, 'changestatus'])->middleware('isAdmin');
