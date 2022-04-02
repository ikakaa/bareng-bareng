<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductComment;
use Auth;

class ProductCommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new ProductComment;
        $comment->comment = $request->input('comment');
        $comment->comment_by_id = Auth::user()->id;
        $comment->commentname = Auth::user()->name;
        $comment->productid = "1";

        $comment->save();
        return redirect()->back()->with('status','Comment Added Successfully');
    }
}
