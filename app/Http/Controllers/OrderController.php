<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function transactiondetail($id)
    {
        $orderdetails = OrderDetails::where('id', $id)->get();
        return view('transactiondetail', compact('orderdetails'));

}
public function transactiondone($id){
    $orderdetails = OrderDetails::where('id', $id)->get();
    $order=Orders::where('id', $orderdetails[0]->order_id)->get();

    //update order status to 5
    $order[0]->status=5;
    $order[0]->isFinish='1';
    $order[0]->save();
    session(['transactiondone' => true]);
    return redirect('/orderhistory');
}
}
