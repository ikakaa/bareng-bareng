<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\UserView;
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
            'moq' => 'required|numeric|min :1',
            'maxorder' => 'required|numeric|min :1',

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
        $product->user_id = Auth::user()->id;
        $product->shortdesc = $request->input('shortdesc');
        $product->moq = $request->input('moq');
        $product->productstock = $request->input('maxorder');
        $product->productprice = $request->input('productprice');
        $product->startdate = $request->input('startdate');
        $tagsdummy    = "";
        foreach ($request->productlist as $chk1) {

            $tagsdummy .= $chk1 . ";";
        }
        $tagsdummy = substr($tagsdummy, 0, -1);
        $product->productlist = $tagsdummy;
        $product->enddate = Carbon::parse($request->input('enddate'))->format('Y-m-d');
        $product->endtime = $request->input('endtime');
        $product->enddategb = Carbon::parse($request->input('enddategb'))->format('Y-m-d');
        $product->shippingdate = Carbon::parse($request->input('shippingdate'))->format('Y-m-d');
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
        alert()->success('Please wait for the verification process.', 'Successfuly uploaded!');

        return redirect('profileseller');
    }

    public function index()
    {

        $product = ProductDetail::distinct('id')->where('verified', '0')->get();;
        return view('productverification', compact('product'));
    }

    public function detail(ProductDetailsFile $id)
    {
        if (isset(Auth::user()->id)) {
            $checkdata = UserView::where('userid', Auth::user()->id)->where('productid', $id->productid)->first();
            if (isset($checkdata->id)) {

                $checkdata->view = $checkdata->view + 1;
                $checkdata->save();
            } else {
                $userview = new UserView;
                $userview->userid = Auth::user()->id;
                $userview->productid = $id->productid;
                $userview->view = 1;
                $userview->save();
            }
        }
        //function untuk menampilkan product
        $products = ProductDetail::where('id', $id->id)->get();
        // $products = ProductDetail::with('productdetailfiles')->where('id', $id->id)->get();
        $productfile = ProductDetailsFile::all();

        return view('product', compact('products', 'productfile'));
    }

    public function edit(ProductDetailsFile $id)
    {
        //function untuk menampilkan product
        $products = ProductDetail::where('id', $id->id)->get();
        $productfiles = ProductDetailsFile::all();
        // $products = ProductDetail::with('productdetailfiles')->where('id', $id->id)->get();


        return view('edit', compact('products', 'productfiles'));
    }

    public function editdetail(ProductDetailsFile $id)
    {
        $products = ProductDetail::where('id', $id->id)->first();
        $productfiles = ProductDetailsFile::where('productid', $id->id)->where('deleted', '0')->get();
        return view('editdetail', compact('products', 'productfiles'));
    }

    public function updatedetail(Request $request, $id)
    {
        $products = ProductDetail::find($id);

        $products->product_name = $request->input('productname');
        $products->productprice = $request->input('productprice');
        $products->shortdesc = $request->input('shortdesc');
        $products->product_type = $request->input('producttype');
        $products->moq = $request->input('moq');
        $products->productstock = $request->input('maxorder');
        $products->shippingdate = $request->input('shippingdate');
        $products->discordlink = $request->input('discord');
        $products->product_name = $request->input('productname');

        $products->save();

        alert()->success('Product edited successfully!', 'Success');
        return redirect('myproductlist');
    }


    public function cart()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($orders) && $orders->totalPrice != '20000') {
            $orderdetails = OrderDetails::where('order_id', $orders->id)->get();
            return view('cart', compact('orders', 'orderdetails'));
        } else {
            return view('cart');
        }
    }

    public function delete($id)
    {
        //function untuk menghapus item dari cart
        $orderdetail = OrderDetails::where('id', $id)->first();

        //mengurangi total price dan update di database
        $order = Orders::where('id', $orderdetail->order_id)->first();
        $order->totalPrice = $order->totalPrice - $orderdetail->totalPrice;
        $order->update();

        $orderdetail->delete();

        alert()->error('Product removed from cart!', 'Remove Item');
        return redirect('cart');
    }

    public function order(Request $request, $id)
    {
        //function untuk melakukan order item dan dimasukkan kedalam database
        $products = ProductDetail::where('id', $id)->first();
        $date = Carbon::now(); //untuk mengambil tanggal hari ini

        $check_order = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //jika user baru melakukan order dan belum checkout
        if (empty($check_order)) {
            $order = new Orders;
            $order->user_id = Auth::user()->id;
            $order->date = $date;
            $order->status = 0;
            $order->totalPrice = 20000;

            $order->save();
        }


        $neworder = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $check_orderdetail = OrderDetails::where('product_id', $products->id)->where('order_id', $neworder->id)->first();

        //jika order detail dari suatu item belum ada
        if (empty($check_orderdetail)) {
            $orderdetail = new OrderDetails;
            $orderdetail->product_id = $products->id;
            $orderdetail->order_id = $neworder->id;
            $orderdetail->seller_id = $products->user_id;
            $orderdetail->qty = $request->qty;
            $orderdetail->variant = $request->producttype;
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
        $order->totalPrice = ($order->totalPrice + $products->productprice * $request->qty);
        $order->update();


        alert()->success('Product added to cart!', 'Success');
        return redirect('home');
    }

    public function payment()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $orderdetails = OrderDetails::where('order_id', $orders->id)->get();
        return view('payment', compact('orders', 'orderdetails'));
    }

    public function makeorder(Request $request)
    {
        $payments = new Payment();
        $orders = Orders::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $request->validate([
            'recipient_name' => ['required', 'string', 'min:5', 'max:255'],
            'address' => ['required', 'string', 'min:5', 'max:255'],
        ]);
        $getorderdetail = OrderDetails::where('order_id', $orders->id)->first();
        $updatestock = ProductDetail::where('id', $getorderdetail->product_id)->first();
        $updatestock->productstock = $updatestock->productstock - $getorderdetail->qty;
        $updatestock->update();

        $payments->order_id = $orders->id;
        $payments->recipient_name = $request->input('recipient_name');
        $payments->address = $request->input('address');
        $payments->payment_method = $request->input('payment_method');

        $payments->save();

        return view('uploadproof', compact('payments'));
    }

    public function uploadproof(Request $request, $id)
    {
        // $request->validate([
        //     'file' => 'required|max:100000|mimes:jpeg,jpg,png,gif',
        // ]);

        $validator = Validator::make($request->all(), [
            'payment_proof' => 'required|max:100000|mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {
            alert()->warning('File must be image and max 10mb!', 'Payment fail!');
            return redirect('home');
            exit;
        }

        $payments = Payment::find($id);
        $order_id = $payments->order_id;
        $orders = Orders::where('id', $order_id)->first();
        $orders->status = 3;
        $orders->save();
        $payments->payment_proof = $request->payment_proof;
        if ($payments->payment_proof) {
            $payments->payment_proof->move('img', $payments->payment_proof->getClientOriginalName());
        }

        $payments->payment_proof = $request->payment_proof->getClientOriginalName();
        $payments->account_name = $request->input('account_name');
        $payments->date = $request->input('date');
        $payments->payment_amount = $request->input('payment_amount');

        $payments->save();

        $order_id = $payments->order_id;
        $orderdetails = OrderDetails::where('order_id', $order_id)->first();

        $product = ProductDetail::where('id', $orderdetails->product_id)->first();

        $product->update();

        alert()->success('Please wait for the verification process.', 'Payment success!');
        return redirect('home');
        // }
    }

    public function ongoing()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->where('isFinish', '!=', '1')->get();
        if (!empty($orders)) {
            //Make foreach loop for orders, if orderdetails isset then push array
            $orderdetails = array();
            foreach ($orders as $order) {
                $orderdetails[] = OrderDetails::where('order_id', $order->id)->get();
            }
            // return $orderdetails;
            return view('ongoing', compact('orders', 'orderdetails'));
        } else {
            return view('ongoing');
        }
    }

    public function paymentverification()
    {
        $payments = Payment::distinct('id')->whereNotNull('payment_proof')->get();
        return view('paymentverification', compact('payments'));
    }

    public function paymentapprove(Orders $id)
    {
        $orders = Orders::with('payments')->where('id', $id->id)->first();
        $orders->status = 1;
        $orders->update();
        return redirect()->back()->with('status', 'Payment Approved Successfully');
    }

    public function paymentreject(Orders $id)
    {
        $orders = Orders::with('payments')->where('id', $id->id)->first();
        $orders->status = 2;
        $orders->update();

        $order_id = $orders->id;
        $orderdetails = OrderDetails::where('order_id', $order_id)->get();
        foreach ($orderdetails as $orderdetail) {
            $product = ProductDetail::where('id', $orderdetail->product_id)->first();
            $product->productstock =  $product->productstock + $orderdetail->qty;
            $product->update();
        }
        return redirect()->back()->with('status', 'Product Rejected Successfully');
    }

    public function myproductlist()
    {
        $products = ProductDetail::where('user_id', Auth::user()->id)->where('isfinish', '0')->where('verified', '1')->get();
        $productfiles = ProductDetailsFile::all();
        return view('myproductlist', compact('products', 'productfiles'));
    }

    public function productverificationlist()
    {
        $products = ProductDetail::where('user_id', Auth::user()->id)->get();
        $productfiles = ProductDetailsFile::all();
        return view('productverificationlist', compact('products', 'productfiles'));
    }

    public function approveproduct(ProductDetail $id)
    {
        $checkproduk = ProductDetail::where('id', $id->id)->first();
        $checkproduk->verified = 1;
        $checkproduk->save();
        return redirect()->back()->with('status', 'Product Approved Successfully');
    }

    public function rejectproduct(Request $request)
    {
        $checkproduk = ProductDetail::where('id', $request->id)->first();
        $checkproduk->verified = 2;
        $checkproduk->rejectreason = $request->input('reason');
        $checkproduk->save();
        return redirect()->back()->with('status', 'Product Rejected Successfully');
    }

    //page order history
    public function orderhistory(Orders $id)
    {
        $orders = Orders::with('order_details')->where('user_id', Auth::user()->id)->where('status', 5)->get();
        $empty = Orders::where('user_id', Auth::user()->id)->where('isFinish', 1)->doesntExist();

        if ($empty) {
            return view('orderhistory');
        } elseif (!empty($orders)) {

            $orderdetails = OrderDetails::where('order_id', $id)->get();

            $order = Orders::where('user_id', Auth::user()->id)->where('isFinish', 1)->get();

            $order_id = $order[0]->id;
            $payments = Payment::where('order_id', $order_id)->first();
            return view('orderhistory', compact('order', 'orderdetails', 'payments'));
        }
    }

    public function orderhistorydetail(OrderDetails $id)
    {
        $details = OrderDetails::where('order_id', $id->id)->get();
        $total = Orders::where('id', $id->id)->first();
        return view('orderhistorydetail', compact('details', 'total'));
    }
    public function editdetailaddimage(Request $request)
    {
        $tgl      = date('Ymd_H_i_s');
        //add image to productdetailfiles
        $productdetailfiles = new ProductDetailsFile;

        $filesize = $_FILES['file']['size'];
        $filetmp  = $_FILES['file']['tmp_name'];
        $filename = $_FILES['file']['name'];
        //select product detail where id=id  then get folder path
        $productdetail = ProductDetail::where('id', $request->input('id'))->first();
        $folderpath = $productdetail->folderpath;

        $filepath = $folderpath . '/' . $tgl . '_' . $filename;
        move_uploaded_file($filetmp, $filepath);
        $productdetailfiles->productid = $request->input('id');
        $productdetailfiles->filename = $filename;
        $productdetailfiles->filepath = $filepath;
        $productdetailfiles->filesize = $filesize;


        $productdetailfiles->save();
        return redirect()->back()->with('status', 'Image Added Successfully');
    }

    public function deleteproductimg($id)
    {

        $productdetailfiles = ProductDetailsFile::where('id', $id)->first();

        $productdetailfiles->deleted = 1;
        $productdetailfiles->save();
        //redirect to product detail
        return redirect()->back()->with('statusdelete', 'Image Deleted Successfully');
    }

    public function endgroupbuy($id)
    {
        $product = ProductDetail::where('id', $id)->first();
        $product->isfinish = '1';
        $product->save();

        alert()->success('Group Buy Ended', 'Success');
        return redirect('/profileseller');
    }
}
