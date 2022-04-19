<?php

namespace App\Http\Controllers;

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
}
