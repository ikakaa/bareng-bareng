<?php

namespace App\Http\Controllers;

use App\Models\SellerVerification;
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
        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        $user = Auth::user();
        $user->sellerapproval = 0;
        $user->sellerapprovalsubmit = 1;
        $user->save();
        $sellerform = new SellerVerification;

              $tgl      = date('Ymd_H_i_s');
            $file = $_FILES['file']['tmp_name'];
            $image = $_FILES['file']['name'];
            $upload_path = 'selleridentity/';
            $upload_file = $upload_path . $tgl . $image;
            move_uploaded_file($file, $upload_file);
            $user->profilepicture = $upload_file;
        return back()->with('success','You have successfully upload image.');

    }

    }

