<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;

class GroupBuyController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::distinct('id')->where('verified','1')->where('interestdone', '1')->where('isfinish', '!=', '1')->paginate(8);
        $productfiles=ProductDetailsFile::all();
        return view('groupbuy', compact('products','productfiles'));
    }

    public function groupbuycategory($category){
        $products = ProductDetail::distinct('id')->where('verified','1')->where('interestdone', '1')->where('isfinish', '!=', '1')->where('product_type', $category)->paginate(8);
        $productfiles=ProductDetailsFile::all();
        return view('groupbuyfilter', compact('products','productfiles'));

    }

}
