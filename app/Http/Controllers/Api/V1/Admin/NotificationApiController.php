<?php

namespace App\Http\Controllers\Api\V1\Admin;


use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

    class NotificationApiController extends Controller
{
 

    public function allnoti()
    {
        return auth()->user()->notifications()->paginate(100);
    }


      public function noticounter()
    {

      
      $noti = auth()->user()->unreadNotifications()->count();
         return  response(['data' =>$noti]);


    }

    public function markread(Request $request)
    {
        $ids = $request->get('notification_ids');
        $notifications = auth()->user()->unreadNotifications()->whereIn('id', $ids)->get();
        $notifications->markAsRead();
       return  response(['data' =>'success']);
            
    }

    public function deletealls(Request $request)
    {
        $ids = $request->get('notification_ids', []);
        auth()->user()->notifications()->whereIn('id', $ids)->delete();

       return response(null, Response::HTTP_NO_CONTENT);
    }
}
