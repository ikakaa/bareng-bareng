<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserView;

class UserViewController extends Controller
{
    //

    public function recommendation()
    {

        function divnum($numerator, $denominator)
        {
            return $denominator == 0 ? 0 : ($numerator / $denominator);
        }
        //select database all user
        $alluser = User::where('id', '!=', Auth::user()->id)->get();
        $loopcurrentuser = Userview::where('userid', Auth::user()->id)->where('userid', '=', Auth::user()->id)->get();

        $averagecurrentuser = UserView::where('userid', Auth::user()->id)->average('view');
        $findnearestvalue = array();
        $penyebutcurruser = 0;
        $penyebutloopuser = 0;
        foreach ($alluser as $user) {

            $collaborativepembilang = 0;
            $collaborativepenyebut = 0;
            $getavguser = UserView::where('userid', $user->id)->average('view');

            foreach ($loopcurrentuser as $loopcurrentuser) {
                if (isset($loopcurrentuser->id)) {
                    $hitungcurruser = $loopcurrentuser->view - $averagecurrentuser;

                    $selecttemporaryview = UserView::where('userid', $user->id)->where('productid', $loopcurrentuser->productid)->first();
                    if (!isset($selecttemporaryview->id)) {
                        $viewcount = 0;
                    } else {
                        $viewcount = $selecttemporaryview->view;
                    }
                    $hitungloopuser = $viewcount - $getavguser;

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
        $mostsimilar = $key;

    }
    public function home(){
        function divnum($numerator, $denominator)
        {
            return $denominator == 0 ? 0 : ($numerator / $denominator);
        }
        //select database all user
        $alluser = User::where('id', '!=', Auth::user()->id)->get();
        $loopcurrentuser = Userview::where('userid', Auth::user()->id)->where('userid', '=', Auth::user()->id)->get();

        $averagecurrentuser = UserView::where('userid', Auth::user()->id)->average('view');
        $findnearestvalue = array();
        $penyebutcurruser = 0;
        $penyebutloopuser = 0;
        foreach ($alluser as $user) {

            $collaborativepembilang = 0;
            $collaborativepenyebut = 0;
            $getavguser = UserView::where('userid', $user->id)->average('view');

            foreach ($loopcurrentuser as $loopcurrentuser) {
                if (isset($loopcurrentuser->id)) {
                    $hitungcurruser = $loopcurrentuser->view - $averagecurrentuser;

                    $selecttemporaryview = UserView::where('userid', $user->id)->where('productid', $loopcurrentuser->productid)->first();
                    if (!isset($selecttemporaryview->id)) {
                        $viewcount = 0;
                    } else {
                        $viewcount = $selecttemporaryview->view;
                    }
                    $hitungloopuser = $viewcount - $getavguser;

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
        $productrecommendation=UserView::where('userid',$mostsimilaruid)->get();
        return view('home',compact('productrecommendation'));
    }
}
