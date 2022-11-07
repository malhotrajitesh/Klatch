<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\Queue\ShouldQueue;

class Myuvamail extends Mailable
{
    use Queueable, SerializesModels;

public $datas;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datas)
    {
       $this->datas = $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->from($address = 'sales@uvatechnology.com', $name = $this->datas['from'])
         ->subject($this->datas['subject'])
                   ->view('emails.uvamail', ['datas' => $this->datas],'text/html');
    }
}
