<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $productlist=ProductDetail::where('verified','1')->get();
       //loop all database
        foreach($productlist as $row){
            $dateexpired = ($row->enddate.' '.$row->endtime);
            $datecurrent = Carbon::now();
            if($datecurrent>$dateexpired){
                $row->interestdone='1';
                $row->save();
            }

        }
        return $next($request);
    }
};
