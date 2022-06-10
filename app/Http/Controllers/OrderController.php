<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Withdrawal;
use App\Models\SellerVerification;

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
        // $productdetailupdate=ProductDetail::where('id',$orderdetails[0]->product_id)->first();

        // $productdetailupdate->isfinish=1;
        // $productdetailupdate->sellingdone=1;
        // $productdetailupdate->save();
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

    
        return redirect('/profileseller');
    }

    public function fund(){
        $status = OrderDetails::where('seller_id', Auth::user()->id)->first();
        $fund = OrderDetails::where('seller_id', Auth::user()->id)->sum('totalPrice');

        // if($status->fundstatus==1){
        //     $fund = OrderDetails::where('seller_id', Auth::user()->id)->sum('totalPrice');
        //     $fund = $fund - $fund;
        // } elseif($status->fundstatus==2) {
        //     $fund = OrderDetails::where('seller_id', Auth::user()->id)->sum('totalPrice');

        // }
        

        return view('profileseller', compact('fund', 'status'));
    }

    public function withdrawalrequest(){
        $requests = Withdrawal::distinct('id')->where('status', '1')->get();
        return view('withdrawalrequest', compact('requests'));
    }

    public function request(){
        $seller = SellerVerification::where('user_id', Auth::user()->id)->first();
        $orderdetail = OrderDetails::where('seller_id', Auth::user()->id)->first();

        $requestwithdrawal = new Withdrawal;
        $requestwithdrawal->seller_id = Auth::user()->id;
        $fund = OrderDetails::where('seller_id', Auth::user()->id)->sum('totalPrice');
        $requestwithdrawal->fund = $fund;
        $requestwithdrawal->status = 1;
        $requestwithdrawal->paymenttype = $seller->paymenttype;
        $requestwithdrawal->paymentnumber = $seller->paymentnumber;
        
        $requestwithdrawal->save();

        $orderdetail->fundstatus = 1;
        $orderdetail->update();

        alert()->success('Please wait for the withdrawal process.', 'Request submitted!');
        return redirect('profileseller');
    }

    public function changestatus(Withdrawal $id){
        $requestwithdrawal = Withdrawal::where('id', $id->id)->first();
        $orderdetail = OrderDetails::where('seller_id', $requestwithdrawal->seller_id)->first();

        $requestwithdrawal->status = 2;
        $requestwithdrawal->update();

        $orderdetail->fundstatus = 2;
        $orderdetail->update();

        return redirect()->back()->with('status', 'Status changed successfully');
    }

    public function withdrawalapprove(){
        $orders = Orders::with('payments')->where('id', $id->id)->first();
        $orders->status = 1;
        $orders->update();
        return redirect()->back()->with('status', 'Payment Approved Successfully');
    }
}
