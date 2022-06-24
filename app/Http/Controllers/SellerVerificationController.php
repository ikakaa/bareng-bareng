<?php

namespace App\Http\Controllers;

use App\Models\SellerVerification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SellerVerificationController extends Controller
{

    public function sellerform()
    {
        return view('sellerform');
    }

    public function resetsellerform()
    {
        //Update status seller to 0
        $user = Auth::user();
        $user->sellerapproval = 0;
        $user->sellerapprovalsubmit = 0;
        $user->save();



        return view('sellerform');
    }
    public function do_uploadrequestseller(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $user = Auth::user();
        $user->sellerapproval = 0;
        $user->sellerapprovalsubmit = 1;
        $user->save();
        $sellerform = new SellerVerification;
        $sellerform->user_id = Auth::user()->id;
        $sellerform->identitynumber = $request->identitynumber;
        $sellerform->identitytype = $request->identitytype;
        $sellerform->address = $request->address;
        $sellerform->paymenttype = $request->paymenttype;
        $sellerform->paymentnumber = $request->paymentnumber;

        $tgl      = date('Ymd_H_i_s');
        $file = $_FILES['file']['tmp_name'];
        $image = $_FILES['file']['name'];
        $upload_path = 'selleridentity/';
        $upload_file = $upload_path . $tgl . $image;
        move_uploaded_file($file, $upload_file);

        $sellerform->identitypath = $upload_file;
        $sellerform->save();
        $user = Auth::user();
        $user->sellerapproval = 0;
        $user->sellerapprovalsubmit = 1;
        $user->save();
        session(['successupload' => true]);
        // return back()->with('success','You have successfully upload image.');
        return redirect('/profilebuyer');
    }
    public function index()
    {
        $product = User::distinct('id')->where('sellerapproval', '0')->where('sellerapprovalsubmit', '1')->get();
        $detail = SellerVerification::all();
        return view('sellerverification', compact('detail', 'product'));
    }

    public function approveseller($id)
    {

        $user = User::find($id);
        $user->sellerapproval = '1';
        $user->save();
        session(['sellerapproved' => true]);
        return redirect('/sellerverification')->with('success', 'You have successfully upload image.');
    }
    public function rejectsellerrequest(Request $request)
    {
        $user = User::find($request->id);

        $user->sellerapproval = '2';
        $user->sellerrejectreason = $request->reason;
        $user->save();
        session(['sellerrejected' => true]);
        return redirect('/sellerverification')->with('success', 'You have successfully upload image.');
    }

    public function detailform($name)
    {
        $detail = SellerVerification::where('user_id', $name)->first();
        return view('sellerformdetail', compact('detail'));
    }
}
