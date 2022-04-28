<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    //
    public function likeproduct($id){
        //search from likes table if user already like this product
        $like = Like::where(['user_id'=>\Auth::id(),'product_id'=>$id])->first();
        //if exist, update status to 1, else insert new record
        if($like){
            $like->status = 1;
            $like->save();

        }else{
            $like=new Like();
            $like->user_id = Auth::id();
            $like->product_id = $id;
            $like->status = 1;
            $like->save();
        }


        return redirect()->back();
    }
    public function dislikeproduct($id){
//update from table like status = 0
        $like = Like::where(['user_id'=>Auth::id(),'product_id'=>$id])->first();
        $like->status ='0';
        $like->save();
        return redirect()->back();

    }
}
