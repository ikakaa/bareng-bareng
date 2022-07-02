<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\ProductDetail;
use App\Models\ProductDetailsFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserView;

class UserViewController extends Controller
{
    //


    public function recommendation()
    {
        echo "Collaborative Filtering Recommendation System";
?>

<?php
        // echo " Data :";
?>

<?php
        // echo " U1 => 1 1 1";
?>

<?php
        // echo " U2 => 4 5 3 ";
?>

<?php
        // echo " U3 => 1 1 1";
?>

<?php
        // echo " U4 => 4 5 3";
?>

<?php
        echo " Current User : UID " . Auth::user()->id; ?>

<?php
        if (isset(Auth::user()->id)) {
            function divnum($numerator, $denominator)
            {
                return $denominator == 0 ? 0 : ($numerator / $denominator);
            }
            //select database all user
            $alluser = User::where('id', '!=', Auth::user()->id)->get();

            $averagecurrentuser = Like::where('user_id', Auth::user()->id)->average('status');
            $countaveragecurruser = Like::where('user_id', Auth::user()->id)->count('id');
            $findnearestvalue = array();

            foreach ($alluser as $user) {
                $looplikes = Like::where('id', '=', Auth::user()->id)->get();
                $countlooplikes = '0';
                $countavgloop='0';
                foreach ($looplikes as $looplike) {
                    $checkrating = Like::where('user_id', $user->id)->where('product_id', $looplike->product_id)->first();
                    $countlooplikes++;
                    if (!isset($checkrating->id)) {
                        $ratingcount = 0;
                    } else {
                        $ratingcount = $checkrating->status;
                    }
                    $countavgloop=$countavgloop+$ratingcount;
                }
                $getavguser = $countavgloop/$countlooplikes;
                $penyebutcurruser = 0;
                $penyebutloopuser = 0;
                $collaborativepembilang = 0;
                $collaborativepenyebut = 0;
                $ambilhitungcurruser = 0;
                $ambilhitungloopuser = 0;
                //  $getavguser = Like::where('user_id', $user->id)->average('status');

                // echo " RATA RATA LOOP USER : ".$getavguser;
?>

<?php
                // $getavguser = $getavguser / $countaveragecurruser;
                // echo " UID : " . $user->id . "  ";
?>

<?php
                $loopcurrentuser = Like::where('user_id', Auth::user()->id)->where('user_id', '=', Auth::user()->id)->get();
                foreach ($loopcurrentuser as $loopcurrentuser) {


                    if (!isset($loopcurrentuser->id)) {
                        $loopcurrentuser->status = 0;
                    }
                    // echo " Hitung curr user : ".$loopcurrentuser->status." - ".$averagecurrentuser;
                    $hitungcurruser = $loopcurrentuser->status - $averagecurrentuser;
                    // echo $hitungcurruser. " = " .$loopcurrentuser->status. " - ".$averagecurrentuser. "END ";
                    $selecttemporarystatus = Like::where('user_id', $user->id)->where('product_id', $loopcurrentuser->product_id)->first();
                    // echo "User id : " . $user->id;
                    // echo "<br>" . "Product id : " . $loopcurrentuser->product_id;
                    if (!isset($selecttemporarystatus->id)) {
                        $statuscount = 0;
                    } else {
                        $statuscount = $selecttemporarystatus->status;
                    }

                    $hitungloopuser = $statuscount - $getavguser;
                    $ambilhitungcurruser = $ambilhitungcurruser + pow($hitungcurruser, 2);
                    $ambilhitungloopuser = $ambilhitungloopuser + pow($hitungloopuser, 2);

                    // echo $ambilhitungloopuser." = ".$ambilhitungloopuser." + ".pow($hitungloopuser,2)." END ";
                    // echo " TOTAL SETELAH PANGKAT 2 : ".$ambilhitungloopuser."END ";
                    // echo $hitungloopuser. " = ".$statuscount. " - ". $getavguser." END ";
                    // echo " = ".$statuscount." - ".$getavguser;
                    $hitungtotal = $hitungcurruser * $hitungloopuser;
                    // $hitungtotal=number_format((float)$hitungtotal, 3, '.', '');
                    // echo " Hitung total ".$hitungtotal." = ".$hitungcurruser." * ".$hitungloopuser;
                    // echo " Collaborative pembilang  SEBELUM:  ".$collaborativepembilang;
                    $collaborativepembilang = $collaborativepembilang + $hitungtotal;
                    // echo " TOTAL COLLABORATIVE PEMBILANG : ".$collaborativepembilang; " END ";
                    // echo " Hitung total = ".$hitungtotal;
                    // echo " Collaborative pembilang  ".$collaborativepembilang. " = ".$collaborativepembilang." + ".$hitungtotal;
                    // $penyebutrp = pow($statuscount - $getavguser, 2);
                    // echo " Penyebut rp ".$penyebutrp." = ".$statuscount." - ".$getavguser;
                    // $penyebutcurrrp = pow($loopcurrentuser->status - $averagecurrentuser, 2);

                    // $penyebutloopuser = $penyebutloopuser + $penyebutrp;
                    // $penyebutcurruser = $penyebutcurruser + $penyebutcurrrp;
                    // echo "Penyebut loop user : ".$penyebutloopuser;
                    // echo " Penyebut curr user : ".$penyebutcurruser;
                    if (!isset($penyebutcurruser)) {
                        $penyebutcurruser = 0;
                    }
                    if (!isset($penyebutloopuser)) {
                        $penyebutloopuser = 0;
                    }
                }
                $collaborativepenyebut = sqrt($ambilhitungcurruser) * sqrt($ambilhitungloopuser);
                // echo " Penyebutloop".sqrt($ambilhitungloopuser);
                // echo "Penyebut curr user : ".sqrt($ambilhitungcurruser);
                // echo "Collaborative penyebut : " . $collaborativepenyebut;
                if (is_nan($collaborativepenyebut) || is_infinite($collaborativepenyebut)) {
                    $collaborativepenyebut = 0;
                } else {
                    $collaborativepenyebut;
                }
                $collaborativetotal = divnum($collaborativepembilang, $collaborativepenyebut);
                // echo $collaborativetotal. " END  Collaborative total = ".$collaborativepembilang." / ".$collaborativepenyebut;
                //only get 2 decimal from collaborativetotal
                $collaborativetotal = number_format((float)$collaborativetotal, 18, '.', '');

                // echo "Collaborative total " . $collaborativetotal . " Penyebut : " . $collaborativepenyebut . " Pembilang : " . $collaborativepembilang;
                // echo "--------------------------------------------------";
                $findnearestvalue[$user->id] = $collaborativetotal;
            }
            // if (!$findnearestvalue) {
            //     $findnearestvalue[1] = 1;
            // }
            $key = array_search(max($findnearestvalue), $findnearestvalue);
            $mostsimilaruid = $key;
            echo "Most similar user ID : " . $key; ?>

            <?php

            return $findnearestvalue;


            $productrecommendation = Like::where('user_id', $mostsimilaruid)->get();
        }
    }
    public function home()
    {
        $getallproduct = ProductDetail::where('verified', '1')->where('interestdone', '0')->get();
        $getallfile = ProductDetailsFile::where('deleted', '0')->get();
        // if (isset(Auth::user()->id)) {
        //     function divnum($numerator, $denominator)
        //     {
        //         return $denominator == 0 ? 0 : ($numerator / $denominator);
        //     }
        //     //select database all user
        //     $alluser = User::where('id', '!=', Auth::user()->id)->get();

        //     $averagecurrentuser = Like::where('user_id', Auth::user()->id)->average('status');
        //     $findnearestvalue = array();
        //     $penyebutcurruser = 0;
        //     $penyebutloopuser = 0;
        //     foreach ($alluser as $user) {

        //         $collaborativepembilang = 0;
        //         $collaborativepenyebut = 0;
        //         $getavguser = Like::where('user_id', $user->id)->average('status');

        //         $loopcurrentuser = Like::where('user_id', Auth::user()->id)->where('user_id', '=', Auth::user()->id)->get();
        //         foreach ($loopcurrentuser as $loopcurrentuser) {

        //             if (isset($loopcurrentuser->id)) {
        //                 // echo " Hitung curr user : ".$loopcurrentuser->status." - ".$averagecurrentuser;
        //                 $hitungcurruser = $loopcurrentuser->status - $averagecurrentuser;

        //                 $selecttemporarystatus = Like::where('user_id', $user->id)->where('product_id', $loopcurrentuser->product_id)->first();
        //                 // echo "User id : " . $user->id;
        //                 // echo "<br>" . "Product id : " . $loopcurrentuser->product_id;
        //                 if (!isset($selecttemporarystatus->id)) {
        //                     $statuscount = 0;
        //                 } else {
        //                     $statuscount = $selecttemporarystatus->status;
        //                 }

        //                 $hitungloopuser = $statuscount - $getavguser;
        //                 // echo "Hitung loop user : " . $statuscount . " - " . $getavguser;
        //                 $hitungtotal = $hitungcurruser * $hitungloopuser;
        //                 $collaborativepembilang = $collaborativepembilang + $hitungtotal;
        //                 $penyebutloopuser = $penyebutloopuser + pow($hitungloopuser, 2);
        //                 $penyebutcurruser = $penyebutcurruser + pow($hitungcurruser, 2);
        //             }
        //             $collaborativepenyebut = sqrt($penyebutcurruser) * sqrt($penyebutloopuser);
        //             $collaborativetotal = divnum($collaborativepembilang, $collaborativepenyebut);
        //             $findnearestvalue[$user->id] = $collaborativetotal;
        //         }
        //     }
        //     if (!$findnearestvalue) {
        //         $findnearestvalue[1] = 1;
        //     }

        //     $key = array_search(max($findnearestvalue), $findnearestvalue);
        //     $mostsimilaruid = $key;

        //     $productrecommendation = Like::where('user_id', $mostsimilaruid)->get();

        //     return view('home', compact('productrecommendation'));
        // } else {
        //     return view('home');
        // }
        $checkhitung = 0;
        $checktotaluser = 0;

        if (isset(Auth::user()->id)) {
            function divnum($numerator, $denominator)
            {
                return $denominator == 0 ? 0 : ($numerator / $denominator);
            }
            //select database all user
            $alluser = User::where('id', '!=', Auth::user()->id)->get();

            $averagecurrentuser = Like::where('user_id', Auth::user()->id)->average('status');
            $countaveragecurruser = Like::where('user_id', Auth::user()->id)->count('id');
            $findnearestvalue = array();

            foreach ($alluser as $user) {
                $looplikes = Like::where('id', '=', Auth::user()->id)->get();
                $countlooplikes = '0';
                $countavgloop='0';
                foreach ($looplikes as $looplike) {
                    $checkrating = Like::where('user_id', $user->id)->where('product_id', $looplike->product_id)->first();
                    $countlooplikes++;
                    if (!isset($checkrating->id)) {
                        $ratingcount = 0;
                    } else {
                        $ratingcount = $checkrating->status;
                    }
                    $countavgloop=$countavgloop+$ratingcount;
                }
                $getavguser = $countavgloop/$countlooplikes;
                $checktotaluser++;
                $checkhitung++;
                $penyebutcurruser = 0;
                $penyebutloopuser = 0;
                $collaborativepembilang = 0;
                $collaborativepenyebut = 0;
                $ambilhitungcurruser = 0;
                $ambilhitungloopuser = 0;
                $getavguser = Like::where('user_id', $user->id)->average('status');
            ?>

<?php
                // $getavguser = $getavguser / $countaveragecurruser;
                // echo " UID : " . $user->id . "  ";
?>

<?php
                $loopcurrentuser = Like::where('user_id', Auth::user()->id)->where('user_id', '=', Auth::user()->id)->get();
                foreach ($loopcurrentuser as $loopcurrentuser) {


                    if (!isset($loopcurrentuser->id)) {
                        $loopcurrentuser->status = 0;
                    }
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

                    // echo " = ".$statuscount." - ".$getavguser;
                    $hitungtotal = $hitungcurruser * $hitungloopuser;
                    // $hitungtotal=number_format((float)$hitungtotal, 3, '.', '');
                    // echo " Hitung total ".$hitungtotal." = ".$hitungcurruser." * ".$hitungloopuser;
                    // echo " Collaborative pembilang  SEBELUM:  ".$collaborativepembilang;
                    $collaborativepembilang = $collaborativepembilang + $hitungtotal;

                    $ambilhitungcurruser = $ambilhitungcurruser + pow($hitungcurruser, 2);
                    $ambilhitungloopuser = $ambilhitungloopuser + pow($hitungloopuser, 2);
                    // echo " Hitung total = ".$hitungtotal;
                    // echo " Collaborative pembilang  ".$collaborativepembilang. " = ".$collaborativepembilang." + ".$hitungtotal;
                    // $penyebutrp = pow($statuscount - $getavguser, 2);
                    // echo " Penyebut rp ".$penyebutrp." = ".$statuscount." - ".$getavguser;
                    // $penyebutcurrrp = pow($loopcurrentuser->status - $averagecurrentuser, 2);

                    // $penyebutloopuser = $penyebutloopuser + $penyebutrp;
                    // $penyebutcurruser = $penyebutcurruser + $penyebutcurrrp;
                    // echo "Penyebut loop user : ".$penyebutloopuser;
                    // echo " Penyebut curr user : ".$penyebutcurruser;
                    if (!isset($penyebutcurruser)) {
                        $penyebutcurruser = 0;
                    }
                    if (!isset($penyebutloopuser)) {
                        $penyebutloopuser = 0;
                    }
                }
                if ($collaborativepembilang == 0) {
                    $checkhitung++;
                }

                $collaborativepenyebut = sqrt($penyebutcurruser) * sqrt($penyebutloopuser);
                // echo " Penyebutloop".sqrt($penyebutloopuser);
                // echo "Penyebut curr user : ".sqrt($penyebutcurruser);
                // echo "Collaborative penyebut : " . $collaborativepenyebut;
                if (is_nan($collaborativepenyebut) || is_infinite($collaborativepenyebut)) {
                    $collaborativepenyebut = 0;
                } else {
                    $collaborativepenyebut;
                }
                $collaborativepenyebut = sqrt($ambilhitungcurruser) * sqrt($ambilhitungloopuser);
                $collaborativetotal = divnum($collaborativepembilang, $collaborativepenyebut);
                // $collaborativetotal = divnum($collaborativepembilang, $collaborativepenyebut);
                //only get 2 decimal from collaborativetotal
                $collaborativetotal = number_format((float)$collaborativetotal, 18, '.', '');

                // echo "Collaborative total " . $collaborativetotal . " Penyebut : " . $collaborativepenyebut . " Pembilang : " . $collaborativepembilang;
                // echo "--------------------------------------------------";
                $findnearestvalue[$user->id] = $collaborativetotal;
            }
            if (!$findnearestvalue) {
                $findnearestvalue[1] = 1;
            }
            // return $findnearestvalue;
            $key = array_search(max($findnearestvalue), $findnearestvalue);
            $mostsimilaruid = $key;
            // echo "Most similar user ID : " . $key;
?>

            <?php

            // return $findnearestvalue;


            $productrecommendation = Like::where('user_id', $mostsimilaruid)->where('status', '>=', '3')->get();
            // return $productrecommendation;
            $productfiles = ProductDetailsFile::all();
            // return view('home', compact('productrecommendation', 'productfiles'));
        } else {
            $checkhitung = 999;


            // return view('home');
        }
        if ($checkhitung >= $checktotaluser) {
            //No data / Recommendation most liked product
            $productrecommendation = Like::select('product_id', \DB::raw('avg(status) as counts'))->groupBy('product_id')->orderBy('counts', 'DESC')->take(3)->get();

            $productfiles = ProductDetailsFile::all();
            return view('home', compact('productrecommendation', 'productfiles', 'getallproduct', 'getallfile'));
        } else {
            $productrecommendation = Like::where('user_id', $mostsimilaruid)->where('status', '>=', '3')->get();
            $productfiles = ProductDetailsFile::all();
            return view('home', compact('productrecommendation', 'productfiles', 'getallproduct', 'getallfile'));
        }
    }
}
