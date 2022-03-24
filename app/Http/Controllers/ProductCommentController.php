<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductComment;
class ProductCommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new ProductComment;
        $comment->comment = $request->input('comment');
        $comment->comment_by = $request->input('commentby');
        $comment->productid = "1";

        $comment->save();
        return redirect()->back()->with('status','Comment Added Successfully');
    }
}
