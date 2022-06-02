<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class OrderController extends Controller
{
    public function transactiondetail($id)
    {
        $orderdetails = OrderDetails::where('id', $id)->get();
        return view('transactiondetail', compact('orderdetails'));
    }
    public function transactiondone($id)
    {
        $orderdetails = OrderDetails::where('id', $id)->get();
        $productdetailupdate=ProductDetail::where('id',$orderdetails[0]->product_id)->first();

        $productdetailupdate->isfinish=1;
        $productdetailupdate->sellingdone=1;
        $productdetailupdate->save();
        $order = Orders::where('id', $orderdetails[0]->order_id)->get();

        //update order status to 5
        $order[0]->status = 5;
        $order[0]->isFinish = '1';
        $order[0]->save();
        session(['transactiondone' => true]);
        return redirect('/orderhistory');
    }
    public function ongoingseller()
    {

        $orderdetails = OrderDetails::all();


        $products = ProductDetail::all();
        $sellername = Auth::user()->name;
        return view('ongoingseller', compact('orderdetails', 'products', 'sellername'));
    }
    public function ongoingsellerdetail($id)
    {
        $ambilorderdetail = OrderDetails::where('id', $id)->get();
        $ambilorder = Orders::where('id', $ambilorderdetail[0]->order_id)->get();

        $ambilpayment = Payment::where('order_id', $ambilorder[0]->id)->get();
        return view('ongoingsellerdetail', compact('ambilorderdetail', 'ambilorder', 'ambilpayment'));
    }
    public function itemsent(Request $request)
    {
        $ambilorder = Orders::where('id', $request->orderdetailid)->get();
        $ambilorder[0]->status = 4;
        $ambilorder[0]->save();

        // redirect
    return redirect('/profileseller');
    }
}
