<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Follow;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
     public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $follow = Follow::find($request->get('follow_id'));
        $follow->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $follow = Follow::find($request->get('follow_id'));

        $follow->comments()->save($reply);

        return back();

    }
}
