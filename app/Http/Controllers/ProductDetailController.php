<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductDetailController extends Controller
{

    protected function validator(array $data)
    {
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        $request->validate([
            'file' => 'required|max:100000|mimes:jpeg,jpg,png,gif',
            'moq' => ['required',  'max :10'],

        ]);
        $product = new ProductDetail;
        // $product->product = $request->input('product');
        $tgl      = date('Ymd_H_i_s');
        $path = 'uploads/' . $tgl . '_' . $request->input('productname');
        $product->folderpath = $path;
        File::makeDirectory($path);
        //Product Folder
        $product->product_name = $request->input('productname');
        $product->owner = $request->input('email');
        $product->shortdesc = $request->input('shortdesc');
        $product->moq = $request->input('moq');
        $product->productstock = $request->input('maxorder');
        $product->productprice = $request->input('productprice');
        $product->startdate = $request->input('startdate');
        $product->enddate = $request->input('enddate');
        $product->endtime = $request->input('endtime');
        $product->shippingdate = $request->input('shippingdate');
        $product->discordlink = $request->input('discord');
        $product->product_type = $request->input('producttype');
        // $product->productid = "1";
        $product->save();
        //Product File
        $productfile = new ProductDetailsFile;
        $filesize = $_FILES['file']['size'];
        $filetmp  = $_FILES['file']['tmp_name'];
        $filename = $_FILES['file']['name'];
        $filepath = $path . '/' . $tgl . '_' . $filename;
        move_uploaded_file($filetmp, $filepath);
        $productfile->productid = $product->id;
        $productfile->filename = $filename;
        $productfile->filepath = $filepath;
        $productfile->filesize = $filesize;
        $productfile->save();


        return redirect()->back()->with('status', 'product Added Successfully');
    }
    public function index(){
        $product = ProductDetail::all();

        return view('productverification',[
            "product"=>ProductDetail::all(),
        ]);
    }

    public function detail(ProductDetail $id)
    {
        //function untuk menampilkan product
        $products = ProductDetail::where('id', $id->id)->get();
        return view('product', compact('products'));
    }
}