<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;
use App\Models\ProductComment;

class InterestCheckController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::distinct('id')->where('verified','1')->where('interestdone', '0')->paginate(8);
        $product = ProductDetail::find($id);

        return view('interestcheck', compact('products', 'product'));
    }

    public function detail(ProductDetailsFile $id)
    {
        $products = ProductDetail::where('id', $id->id)->get();
        $comments = ProductComment::all();

        return view('interestcheckdetail', compact('products', 'comments'));
    }
    public function interestcheckcategory($category){
        $products = ProductDetail::distinct('id')->where('verified','1')->where('interestdone', '0')->where('product_type', $category)->paginate(8);
        $checkfilter=true;
        return view('interestcheckfilter', compact('products','checkfilter'));
    }
}
