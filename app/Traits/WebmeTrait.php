<?php

namespace App\Traits;

use App\User;
use App\Profile;
use Notification;
use URL;
use Illuminate\Http\Request;


trait WebmeTrait
{

    public function notidata($uid,$fdata,$a_admin,$mf,$mc)
    {

   if(is_array($fdata))
{
  $stitle= $fdata['title'];
  $sidx = $fdata['id'];
}
else{
 $stitle= $fdata;
  $sidx = '#';
}

if($mf=='store' || $mf=='process'){

if($mf== 'process')
{
$nio= 'Under process';
}
else{
  $nio= 'Under Review';
}



 $profile =Profile::where('created_by_id', $uid)->first();
        $datas = [

              
            'title' => 'your '.$mc.' <b> '. $stitle.'</b> '.$nio,
            'pic' =>  URL::asset("/public/image/".$profile->propic ?? ''),
             'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $uid
              ];

            $user =User::where('id',$uid)->first();

       $user->notify(new \App\Notifications\MyDbNotification($datas));
       
       if($a_admin == 1){
         $user =User::first();
         $datas = [

              
            'title' => 'New '.$mc.' <b> '. $stitle.' </b> created by <b> '.$profile->name.'</b>',
            'pic' =>  URL::asset("/public/image/".$profile->propic ?? ''),
            'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $user->id
              ]; 

              $user->notify(new \App\Notifications\MyDbNotification($datas));

       }
       return;
}

if($mf=='like' || $mf=='interest' || $mf=='view' || $mf=='reply' || $mf=='apply' || $mf=='comment'){
$userId = Auth()->user()->id;
$uname =  Auth()->user()->name;
$ulike =Profile::where('created_by_id', $userId)->first();



        $datas = [

              
            'title' => '<b>'. $uname.' </b> '. $mf.' Your '. $mc.' <b> '. $stitle.'</b>' ,
            'pic' =>  URL::asset("/public/image/".$ulike->propic ?? ''),
               'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $userId
              ]; 
                $user =User::where('id',$uid)->first();

       $user->notify(new \App\Notifications\MyDbNotification($datas));
       
    
       return;
}

if($mf=='Saved' || $mf=='viewed' || $mf=='applied' || $mf=='commented'){
$userId = Auth()->user()->id;
$uname =  Auth()->user()->name;
$ulike =Profile::where('created_by_id', $uid)->first();

        $datas = [

                        
            'title' => 'You '.$mf.' <b> '.$stitle.' <b> this '.$mc,
            'pic' =>  URL::asset("/public/image/".$ulike->propic ?? ''),
              'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $userId
              ]; 
            $user =User::where('id',$uid)->first();  

       $user->notify(new \App\Notifications\MyDbNotification($datas));
       
    
       return;
}

if($mf=='verify'){

$uname =  Auth()->user()->name;
$ulike =Profile::where('created_by_id', $uid)->first();


        $datas = [
          
            'title' => 'Your '. $mc .'<b> '. $stitle .'</b> by Admin  <b>'. $uname,
            'pic' =>  URL::asset("/public/image/".$ulike->propic ?? ''),
             'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $uid
              ]; 
            $user =User::where('id',$uid)->first();  

       $user->notify(new \App\Notifications\MyDbNotification($datas));
       
    
       return;
}




             

  



  /////// close brackets   
    }




}


