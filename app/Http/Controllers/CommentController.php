<?php

namespace App\Http\Controllers;

use App\ReplyComment;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function storecomment(Request $request)
    {
        $comment= new Comment();
        $comment->comment=$request->comment;
        $comment->content_id=$request->content_id;
        $comment->user_id=Auth::user()->id;
        $comment->save();
        return response()->json();
    }

    public function storereply(Request $request)
    {
        $reply= new ReplyComment();
        $reply->reply=$request->reply;
        $reply->comment_id=$request->comment_id;
        $reply->user_id=Auth::user()->id;
        $reply->save();

        return response()->json();
    }
    
}
