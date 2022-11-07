<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Ad;
use Illuminate\Notifications\Messages\MailMessage;

class ToEmail extends Notification
{
    use Queueable;


    public $ad;

    /**
     * Create a new notification instance.
     *
     * @return void
   
     */

    public function __construct($ad)
    {
        //$this->fromAd = $ad;
          $this->$ad = $ad;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
          
      /*    print_r($this->ad['adti']);
          die("koli");
               $subject = sprintf('%s: You\'ve got a new Ad from %s!', config('app.name'), $this->ad->adti);
        $greeting = sprintf(' Description %s!', $notifiable->adtd);
          $message = sprintf(
            'Ad Deatils Below.',
            $this->ad->longitude,
            $this->ad->latitude,
           $this->ad->ad_type,
            $this->ad->ad_city
        );


      */
         $message = sprintf(
            '%1$s <%2$s> arrived home at ',
            $notifiable->name,
            $notifiable->email
           // $this->now()
        );

        return (new MailMessage)
                    ->subject('Laravel 5.4 notifications demo')
                    ->line($message);
    

/*
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->salutation('Yours Faithfully')
                    ->line($message)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!'); */
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
  public function toDatabase($notifiable)
    {
        return [
            'user_id' => $notifiable->id,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ];
    }
    

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
