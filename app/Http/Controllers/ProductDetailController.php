<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;

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
        $product->owner = Auth::user()->name;
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


        return redirect()->back()->with('status', 'Product Added Successfully');
    }
    public function index(){

        $product = ProductDetail::distinct('id')->where('verified','0')->get();;
        return view('productverification', compact('product'));
    }

    public function detail(ProductDetailsFile $id)
    {
        //function untuk menampilkan product
        $products = ProductDetail::where('id', $id->id)->get();
        // $products = ProductDetail::with('productdetailfiles')->where('id', $id->id)->get();


        return view('product', compact('products'));
    }

    public function order(Request $request, $id)
    {
        //function untuk melakukan order item dan dimasukkan kedalam database
        $products = ProductDetail::where('id', $id)->first();
        $date = Carbon::now(); //untuk mengambil tanggal hari ini

        //validasi apabila quantity yang diinput lebih besar dibandingkan stock
        // if($request->qty > $products->productstock){
        //     return redirect('/product/{id}');
        // }

        $check_order = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //jika user baru melakukan order dan belum checkout
        if(empty($check_order)){
            $order = new Orders;
            $order->user_id = Auth::user()->id;
            $order->date = $date;
            $order->status = 0;
            $order->totalPrice = 0;
            
            $order->save();
        }
       

        $neworder = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $check_orderdetail = OrderDetails::where('product_id', $products->id)->where('order_id', $neworder->id)->first();

        //jika order detail dari suatu item belum ada
        if(empty($check_orderdetail)){
            $orderdetail = new OrderDetails;
            $orderdetail->product_id = $products->id;
            $orderdetail->order_id = $neworder->id;
            $orderdetail->qty = $request->qty;
            $orderdetail->totalPrice = $products->productprice * $request->qty;
            
            $orderdetail->save();
        } else {

            //jika suatu item sudah pernah dipesan sebelumnya maka hanya update qty dan harga
            $orderdetail = OrderDetails::where('product_id', $products->id)->where('order_id', $neworder->id)->first();

            $orderdetail->qty = $orderdetail->qty + $request->qty;
            $newPrice = $products->productprice * $request->qty;
            $orderdetail->totalPrice = $orderdetail->totalPrice + $newPrice;
            
            $orderdetail->update();
        }
        
        //update total price di table order
        $order = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order->totalPrice = $order->totalPrice + $products->productprice * $request->qty;
        $order->update();

        return redirect('home');
    }

    public function cart(){
        //function untuk membuka view checkout, user dapat melihat cart berisi pesanan mereka
        $orders = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // if(!empty($order)){
            $orderdetails = OrderDetails::where('order_id', $orders->id)->get();
            return view('cart', compact('orders', 'orderdetails'));
        // } else {
        //     return view('cart');
        // }
    }

    public function approveproduct(ProductDetail $id){
        $checkproduk = ProductDetail::where('id',$id->id)->first();
        $checkproduk->verified = 1;
        $checkproduk->save();
        return redirect()->back()->with('status', 'Product Approved Successfully');
    }
    
    public function rejectproduct(ProductDetail $id){
        $checkproduk = ProductDetail::where('id',$id->id)->first();
        $checkproduk->verified = 2;
        $checkproduk->save();
        return redirect()->back()->with('status', 'Product Rejected Successfully');
    }
}
