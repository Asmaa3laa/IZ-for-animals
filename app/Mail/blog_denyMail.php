<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class blog_denyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@allaboutanimals-eg.com','All About Animals')
        ->subject('Your blog has been rejected')
        ->view('admin.mail.blog_deny');
    }
}
