<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductComment;
use App\Models\ProductDetail;
use Auth;

class ProductCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $comment = new ProductComment;
        $comment->comment = $request->input('comment');
        $comment->comment_by_id = Auth::user()->id;
        $comment->commentname = Auth::user()->name;
        $comment->product_id = $id;

        $comment->save();
        return redirect()->back()->with('status','Comment Added Successfully');
    }
}
