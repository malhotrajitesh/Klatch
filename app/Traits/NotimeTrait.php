<?php

namespace App\Traits;

use App\User;
use App\Profile;
use Notification;
use URL;
use Illuminate\Http\Request;


trait NotimeTrait
{

    public function notidata($uid,$fdata,$a_admin,$mf,$mc)
    {

            if($mf=='Admin'){
         $user =User::first();
          $profile =Profile::where('created_by_id', $uid)->first();
         $datas = [

              
            'title' => 'New User <b> '. $fdata.'</b> and <b> '.$mc.'</b> registered',
            'pic' =>  URL::asset("/public/image/".$profile->propic ?? ''),
            'module' =>  '#',
            'mtype' =>  $mc,
           'created_by_id' => $user->id
              ]; 

              $user->notify(new \App\Notifications\MyDbNotification($datas));

       }

           if($mf=='Report'){
         $user =User::first();
          $profile =Profile::where('created_by_id', $uid)->first();
                  if(is_array($fdata))
{
  $stitle= $fdata['title'];
  $sidx = $fdata['id'];
}
else{
 $stitle= $fdata;
  $sidx = '#';
}
         $datas = [

              
            'title' => 'New  '. $mf.' on <b> '.$mc.'</b> Question <b> '. $stitle.'</b>',
            'pic' =>  URL::asset("/public/image/".$profile->propic ?? ''),
             'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $user->id
              ]; 

              $user->notify(new \App\Notifications\MyDbNotification($datas));

       }

if($mf=='store'){

 $profile =Profile::where('created_by_id', $uid)->first();

   if(is_array($fdata))
{
  $stitle= $fdata['title'];
  $sidx = $fdata['id'];
}
else{
 $stitle= $fdata;
  $sidx = '#';
}
        $datas = [

              
            'title' => 'your '.$mc.'<b> '.$stitle.'</b> Under Review' ,
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

              
            'title' => 'New '.$mc.' <b> '. $stitle.'</b> created by <b> '.$profile->name.'</b>',
            'pic' =>  URL::asset("/public/image/".$profile->propic ?? ''),
             'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $user->id
              ]; 

              $user->notify(new \App\Notifications\MyDbNotification($datas));

       }
       return;
}

if($mf=='like' || $mf=='interest' || $mf=='reply' || $mf=='apply' || $mf=='comment'){
$userId = Auth()->user()->id;
$uname =  Auth()->user()->name;
$ulike =Profile::where('created_by_id', $userId)->first();


   if(is_array($fdata))
{
  $stitle= $fdata['title'];
  $sidx = $fdata['id'];
}
else{
 $stitle= $fdata;
  $sidx = '#';
}
        $datas = [

              
            'title' => '<b> '.$uname.' </b> '.$mf.' Your '.$mc.' <b> '.$stitle.'</b>' ,
            'pic' =>  URL::asset("/public/image/".$ulike->propic ?? ''),
            'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $userId
              ]; 
                $user =User::where('id',$uid)->first();

       $user->notify(new \App\Notifications\MyDbNotification($datas));
       
    
       return;
}

if($mf=='Saved' || $mf=='applied' || $mf=='commented'){
$userId = Auth()->user()->id;
$uname =  Auth()->user()->name;
$ulike =Profile::where('created_by_id', $uid)->first();

   if(is_array($fdata))
{
  $stitle= $fdata['title'];
  $sidx = $fdata['id'];
}
else{
 $stitle= $fdata;
  $sidx = '#';
}

        $datas = [

                        
            'title' => 'You '.$mf.' <b> '.$stitle.'</b> this '.$mc,
            'pic' =>  URL::asset("/public/image/".$ulike->propic ?? ''),
            'module' =>  $sidx,
            'mtype' =>  $mc,
           'created_by_id' => $userId
              ]; 
            $user =User::where('id',$uid)->first();  

       $user->notify(new \App\Notifications\MyDbNotification($datas));
       
    
       return;
}





             

  



  /////// close brackets   
    }




}



