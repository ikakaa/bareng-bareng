<?php

namespace App\Http\Controllers;
use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductDetailController extends Controller
{
    public function store(Request $request)
    {
        $product = new ProductDetail;
        // $product->product = $request->input('product');
        $tgl      = date('Ymd_H_i_s');
        $path='uploads/'.$tgl.'_'.$request->input('productname');
        $product->folderpath=$path;
        File::makeDirectory($path);
        // dd($path);

        $product->product_name=$request->input('productname');
        $product->owner=$request->input('email');
        $product->shortdesc=$request->input('shortdesc');
        $product->moq=$request->input('moq');
        $product->productstock=$request->input('maxorder');
        $product->productprice=$request->input('productprice');
        $product->startdate=$request->input('startdate');
        $product->enddate=$request->input('enddate');
        $product->endtime=$request->input('endtime');
        $product->shippingdate=$request->input('shippingdate');
        $product->discordlink=$request->input('discord');
        $product->product_type=$request->input('producttype');
        // $product->productid = "1";

        $product->save();

        $productfile = new ProductDetailsFile;

        $tgl      = date('Ymd_H_i_s');
        $filesize = $_FILES['file']['size'];
        $filetmp  = $_FILES['file']['tmp_name'];
        $filename = $_FILES['file']['name'];
$filepath=$path.'/'.$tgl.'_'.$filename;
        move_uploaded_file($filetmp, $filepath);



        return redirect()->back()->with('status','product Added Successfully');
    }
}
