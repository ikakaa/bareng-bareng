<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;

class InterestCheckController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::paginate(8);
        return view('interestcheck', compact('products'));
    }

    public function detail(ProductDetailsFile $id)
    {
        $products = ProductDetail::where('id', $id->id)->get();
        return view('interestcheckdetail', compact('products'));
    }
}
