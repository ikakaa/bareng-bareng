<?php

namespace App\Http\Controllers;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search_text = $_GET['query'];
        $products = ProductDetail::where('product_name','LIKE', '%'.$search_text.'%')->get();

        return view('search', compact('products'));
    }
}
