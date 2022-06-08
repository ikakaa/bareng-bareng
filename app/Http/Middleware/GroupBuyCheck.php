<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ProductDetail;

class GroupBuyCheck
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
            $gbexpired = Carbon::parse($row->enddategb)->format('Y-m-d');

            $datecurrent = Carbon::now();

            if ($datecurrent > $gbexpired || $row->productstock == 0) {

                $row->isfinish = 2;
                $row->save();
            }
        }
        return $next($request);
    }
};
