<?php
// app/Mail/NewsletterThankYouMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function build()
    {
        return $this->subject('Merci de vous être abonné!')
                    ->view('emails.newsletter_thankyou');
    }
}
