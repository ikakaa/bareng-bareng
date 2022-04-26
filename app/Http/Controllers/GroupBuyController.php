<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;

class GroupBuyController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::distinct('id')->where('verified','1')->where('interestdone', '1')->paginate(8);
        return view('groupbuy', compact('products'));
    }
public function groupbuycategory($category){
    $products = ProductDetail::distinct('id')->where('verified','1')->where('interestdone', '1')->where('product_type', $category)->paginate(8);
    return view('groupbuyfilter', compact('products'));

}

}
