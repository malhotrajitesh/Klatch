<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Utils\helpers;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\URL;

class MySocialNotification extends Notification
{
    use Queueable;
    private $datas;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($datas)
    {
     $this->datas = $datas;   
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */



    public function toMail($notifiable)
    {
         $follow = $notifiable;
         return (new MailMessage)
         ->from($address = 'deepak@uvatechnology.com', $name = setting('app_name', config('app.name', 'Laravel')))
                   ->cc('devlover03@gmail.com')
                   ->greeting($this->datas['greeting'])
                    ->subject($this->datas['title'])
                      ->line(new HtmlString($this->datas['body']))
                    ->line("We are really happy that you started to use ".config('app.name')."!")
                    ->action($this->datas['actionText'], $this->datas['actionURL']);
             
       
    }
    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
       
            return [
            'title'         => $this->datas['title'],
            'module'        => $this->datas['module'],
            'type'          => $this->datas['created_by_id'], 
           'user_agent' => request()->userAgent(),
        ];
    }
}
