<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\RefundRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RefundRequestController extends Controller
{
    public function refundsend(Request $request)
    {
        $updatestatusorder=Orders::where('id',$request->id);
        $updatestatusorder->status='6';
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
    public function refundverification(){
        $refunds=RefundRequest::where('status','0')->get();
        return view('refundverification',compact('refunds'));
    }
}
