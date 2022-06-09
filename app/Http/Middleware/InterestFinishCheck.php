<?php

namespace App\Http\Middleware;

use App\Models\Like;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ProductDetailsFile;
use App\Models\ProductDetail;

class InterestFinishCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        date_default_timezone_set('Asia/Bangkok');
        $tgl      = date('Y-m-d H:i:s');
        $productlist = ProductDetail::where('verified', '1')->get();
        //loop all database

        foreach ($productlist as $row) {

            $getendate = Carbon::parse($row->enddate)->format('Y-m-d');

            $dateexpired = ($getendate . ' ' . $row->endtime);
            $datecurrent = Carbon::now();

?>

<?php
            if ($datecurrent > $dateexpired) {

                $gettotallike = Like::where('product_id', $row->id)->count('status');
                // @dd($gettotallike);
                if (isset($gettotallike)) {

                    if ($gettotallike >= $row->moq) {
                        $row->interestdone = '1';
                        $row->save();
                    } else {
                        $row->interestdone = '1';
                        $row->isfinish = '1';
                        $row->icfail = '1';
                        $row->save();
                    }
                } else {
                    $row->interestdone = '1';
                    $row->isfinish = '1';
                    $row->icfail = '1';
                    $row->save();
                }
            }
        }
        return $next($request);
    }
};
