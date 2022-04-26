<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $products = ProductDetail::distinct('id')->where('verified','1')->where('interestdone', '1')->paginate(8);
        return view('category', compact('products'));
    }

}
