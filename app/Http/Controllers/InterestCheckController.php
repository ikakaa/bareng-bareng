<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;
use App\Models\ProductComment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\isEmpty;

class InterestCheckController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::distinct('id')->where('verified', '1')->where('interestdone', '0')->paginate(8);
        $product = ProductDetail::find($id);

        return view('interestcheck', compact('products', 'product'));
    }

    public function detail(ProductDetailsFile $id)
    {
if(!isset(Auth::user()->id)){
    return redirect('/login');
}
        $products = ProductDetail::where('id', $id->id)->get();
        $comments = ProductComment::all();
        $productfile = ProductDetailsFile::all();
        $like = Like::where('product_id', $id->id)->where('user_id',Auth::user()->id)->where('status',1)->get();
$countlike=Like::where('product_id', $id->id)->where('status',1)->get();

$totallike=$countlike->count();
        $checklike='0';
if($like->isEmpty()){

$checklike='1';
}

        return view('interestcheckdetail', compact('products', 'comments', 'productfile', 'like', 'checklike','totallike'));
    }
    public function interestcheckcategory($category)
    {
        $products = ProductDetail::distinct('id')->where('verified', '1')->where('interestdone', '0')->where('product_type', $category)->paginate(8);
        $checkfilter = true;
        return view('interestcheckfilter', compact('products', 'checkfilter'));
    }
}
