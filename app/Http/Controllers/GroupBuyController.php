<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;

class GroupBuyController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::paginate(6);
        return view('groupbuy', compact('products'));
    }
}
