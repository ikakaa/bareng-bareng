<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\ProductDetailsFile;
use App\Models\RefundRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductDetail;

class RefundRequestController extends Controller
{
    public function refundsend(Request $request)
    {
        $updatestatusorder = Orders::where('id', $request->id)->first();
        $updatestatusorder->status = '6';
        $updatestatusorder->save();
        $refund = new RefundRequest;
        $refund->userid = Auth::user()->id;
        $refund->orderid = $request->orderid;
        $refund->title = $request->title;
        $refund->reason = $request->message;
        $refund->paymentType = $request->paymenttype;
        $refund->paymentNumber = $request->paymentnumber;
        $refund->save();
        //redirect to profilebuyer with success
        return redirect('/profilebuyer')->with('success', 'Refund request sent successfully');
    }
    public function requestlist()
    {
        $refunds = RefundRequest::where('userid', Auth::user()->id)->get();

        return view('requestlist', compact('refunds'));
    }
    public function refundverification()
    {
        $refunds = RefundRequest::where('status', '0')->get();
        return view('refundverification', compact('refunds'));
    }
    public function refunddetail($id)
    {
        $refund = RefundRequest::where('id', $id)->first();
        $productfile = ProductDetailsFile::all();
        return view('refunddetail', compact('refund', 'productfile'));
    }
    public function refundreject(Request $request)
    {
        // return $request;
        $refund = RefundRequest::where('id', $request->id)->first();
        $refund->status = '2';
        $refund->rejectreason = $request->reason;
        $refund->save();
        $order = Orders::where('id', $refund->orderid)->first();
        $order->status = '7';
        $order->isFinish='1';
        $order->rejetStatus = $request->reason;
        $order->save();
        alert()->error('Refund Rejected!', 'Successfully Rejected');
        return redirect()->back();
    }
    public function refundapprove($id)
    {
        $refund = RefundRequest::where('id', $id)->first();
        $refund->status = '1';

        $refund->save();
        $order = Orders::where('id', $refund->orderid)->first();
        $order->status = '8';
        $order->isFinish='1';
        $order->save();
        alert()->success('Refund Approved!', 'Successfully Approved');
        return redirect()->back();
    }

}

