<?php

namespace App\Listeners;

use App\Events\AdLiked;
use App\User;
use App\Buy_ad;
use Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdLiked
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdLiked  $event
     * @return void
     */
    public function handle(AdLiked $event)
    {
      $ad = Buy_ad::where('id','=', $event->data['ad_id'])->first();
   //   print_r("expression");
     // print_r($event->data['ad_id']);
     // print_r($ad->created_by_id);
    //  print_r($ad->id);
     // die("jon");
       User::where('id','=', $ad->created_by_id)->get()
         ->each(function($user) use ($event){
                $user->notify(new \App\Notifications\OffersNotification($event->data));
            });
       // $users->notify(new \App\Notifications\ToEmail($event->adsaved));

        //Mail::to('devlover03@gmail.com')->send('admin.emails.invitation', $event->adsaved);
//return $event->adsaved;
       // foreach($users as $user) {
         //   $user->notify(new \App\Notifications\ToEmail($event->adsaved));
           //Mail::to($user)->send('admin.emails.invitation', $event->adsaved);
       // }  //
    }
}
