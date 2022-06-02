<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserView;

class UserViewController extends Controller
{
    //

    public function recommendation()
    {
        if (isset(Auth::user()->id)) {
            function divnum($numerator, $denominator)
            {
                return $denominator == 0 ? 0 : ($numerator / $denominator);
            }
            //select database all user
            $alluser = User::where('id', '!=', Auth::user()->id)->get();

            $averagecurrentuser = Like::where('user_id', Auth::user()->id)->average('status');
            $findnearestvalue = array();
            $penyebutcurruser = 0;
            $penyebutloopuser = 0;
            foreach ($alluser as $user) {

                $collaborativepembilang = 0;
                $collaborativepenyebut = 0;
                $getavguser = Like::where('user_id', $user->id)->average('status');

                $loopcurrentuser = Like::where('user_id', Auth::user()->id)->where('user_id', '=', Auth::user()->id)->get();
                foreach ($loopcurrentuser as $loopcurrentuser) {

                    if (isset($loopcurrentuser->id)) {
                        // echo " Hitung curr user : ".$loopcurrentuser->status." - ".$averagecurrentuser;
                        $hitungcurruser = $loopcurrentuser->status - $averagecurrentuser;

                        $selecttemporarystatus = Like::where('user_id', $user->id)->where('product_id', $loopcurrentuser->product_id)->first();
                        // echo "User id : " . $user->id;
                        // echo "<br>" . "Product id : " . $loopcurrentuser->product_id;
                        if (!isset($selecttemporarystatus->id)) {
                            $statuscount = 0;
                        } else {
                            $statuscount = $selecttemporarystatus->status;
                        }

                        $hitungloopuser = $statuscount - $getavguser;
                        // echo "Hitung loop user : " . $statuscount . " - " . $getavguser;
                        $hitungtotal = $hitungcurruser * $hitungloopuser;
                        $collaborativepembilang = $collaborativepembilang + $hitungtotal;
                        $penyebutloopuser = $penyebutloopuser + pow($hitungloopuser, 2);
                        $penyebutcurruser = $penyebutcurruser + pow($hitungcurruser, 2);
                    }

                    $collaborativepenyebut = sqrt($penyebutcurruser) * sqrt($penyebutloopuser);
                    $collaborativetotal = divnum($collaborativepembilang, $collaborativepenyebut);
                    $findnearestvalue[$user->id] = $collaborativetotal;
                }
            }
            if (!$findnearestvalue) {
                $findnearestvalue[1] = 1;
            }
            return $findnearestvalue;
            $key = array_search(max($findnearestvalue), $findnearestvalue);
            $mostsimilaruid = $key;
            $productrecommendation = Like::where('user_id', $mostsimilaruid)->get();
        }
    }
    public function home()
    {
        if (isset(Auth::user()->id)) {
            function divnum($numerator, $denominator)
            {
                return $denominator == 0 ? 0 : ($numerator / $denominator);
            }
            //select database all user
            $alluser = User::where('id', '!=', Auth::user()->id)->get();

            $averagecurrentuser = Like::where('user_id', Auth::user()->id)->average('status');
            $findnearestvalue = array();
            $penyebutcurruser = 0;
            $penyebutloopuser = 0;
            foreach ($alluser as $user) {

                $collaborativepembilang = 0;
                $collaborativepenyebut = 0;
                $getavguser = Like::where('user_id', $user->id)->average('status');

                $loopcurrentuser = Like::where('user_id', Auth::user()->id)->where('user_id', '=', Auth::user()->id)->get();
                foreach ($loopcurrentuser as $loopcurrentuser) {

                    if (isset($loopcurrentuser->id)) {
                        // echo " Hitung curr user : ".$loopcurrentuser->status." - ".$averagecurrentuser;
                        $hitungcurruser = $loopcurrentuser->status - $averagecurrentuser;

                        $selecttemporarystatus = Like::where('user_id', $user->id)->where('product_id', $loopcurrentuser->product_id)->first();
                        // echo "User id : " . $user->id;
                        // echo "<br>" . "Product id : " . $loopcurrentuser->product_id;
                        if (!isset($selecttemporarystatus->id)) {
                            $statuscount = 0;
                        } else {
                            $statuscount = $selecttemporarystatus->status;
                        }

                        $hitungloopuser = $statuscount - $getavguser;
                        // echo "Hitung loop user : " . $statuscount . " - " . $getavguser;
                        $hitungtotal = $hitungcurruser * $hitungloopuser;
                        $collaborativepembilang = $collaborativepembilang + $hitungtotal;
                        $penyebutloopuser = $penyebutloopuser + pow($hitungloopuser, 2);
                        $penyebutcurruser = $penyebutcurruser + pow($hitungcurruser, 2);
                    }

                    $collaborativepenyebut = sqrt($penyebutcurruser) * sqrt($penyebutloopuser);
                    $collaborativetotal = divnum($collaborativepembilang, $collaborativepenyebut);
                    $findnearestvalue[$user->id] = $collaborativetotal;
                }
            }
            if (!$findnearestvalue) {
                $findnearestvalue[1] = 1;
            }

            $key = array_search(max($findnearestvalue), $findnearestvalue);
            $mostsimilaruid = $key;

            $productrecommendation = Like::where('user_id', $mostsimilaruid)->get();

            return view('home', compact('productrecommendation'));
        } else {
            return view('home');
        }
    }
}
