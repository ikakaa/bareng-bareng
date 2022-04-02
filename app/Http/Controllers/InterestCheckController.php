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
        $products = ProductDetail::distinct('id')->where('verified','1')->paginate(8);
        return view('interestcheck', compact('products'));
    }

    public function detail(ProductDetailsFile $id)
    {
        $products = ProductDetail::where('id', $id->id)->get();
        $comments = ProductComment::all();
        
        return view('interestcheckdetail', compact('products', 'comments'));
    }
}
