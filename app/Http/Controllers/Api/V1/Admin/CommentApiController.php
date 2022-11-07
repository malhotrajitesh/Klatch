<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use App\Follow;
use App\Traits\NotimeTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentApiController extends Controller
{
 use  NotimeTrait;

 public function getreply(Request $request)
    {
       $grepcom= Comment::where('id',$request->comment_id)->latest()->with(['udetail:created_by_id,name,propic','replies'])->get();
        return  response(['data'=>$grepcom]);

    }

 public function commentdel(Request $request)
    {
$comment=Comment::where('id',$request->id)->first();
    $comment->delete();
    return  response(['data'=>"success"]);
}




     public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $follow = Follow::withoutGlobalScope('created_by_id')->find($request->get('follow_id'));
        $follow->comments()->save($comment);
         $userId = Auth()->user()->id;
     $fdata = array(
      'title'   => $follow['so_title'],
      'id'          => $follow['id']);
                 $uid=$userId;
            //  $fdata = $follow['so_title'];
              $a_admin=0;
              $mf='commented';
              $mc='Post';
       $this->notidata($uid,$fdata,$a_admin,$mf,$mc);


if($userId != $follow['created_by_id'])
{

 

    
              $uid=$follow['created_by_id'];
  
    //   $fdata = $follow['so_title'];
      
              $a_admin=0;
              $mf='comment';
              $mc='post';
       $this->notidata($uid,$fdata,$a_admin,$mf,$mc);

       }   

                
               
         return  response(['data'=>'success']);

      
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $follow = Follow::withoutGlobalScope('created_by_id')->find($request->get('follow_id'));

        $follow->comments()->save($reply);
     $uxm=   Comment::where('id',$request->get('comment_id'))->first();
     
              $cobud = substr($uxm['body'],0,100);

                     $uid=$uxm['user_id'];
    
         $fdata = array(
      'title'   => $follow['so_title'],
      'id'          => $follow['id']);
              
              $a_admin=0;
              $mf='reply';
              $mc='on comment ' .$cobud.' post';
       $this->notidata($uid,$fdata,$a_admin,$mf,$mc);

        return  response(['data'=>'success']);

    }






}
