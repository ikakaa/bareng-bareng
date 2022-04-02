<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;

class GroupBuyController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::distinct('id')->where('verified','1')->paginate(8);
        return view('groupbuy', compact('products'));

        // $products = ProductDetail::with('productdetailfiles')->get();
        // return view('groupbuy', compact('products'));
    }


}
