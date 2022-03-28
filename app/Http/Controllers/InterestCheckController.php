<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;

class InterestCheckController extends Controller
{
    public function index(ProductDetail $id)
    {
        $products = ProductDetail::paginate(6);
        return view('interestcheck', compact('products'));
    }
}
