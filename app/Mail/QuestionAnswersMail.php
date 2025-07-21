<?php

namespace App\Mail;

use App\Models\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuestionAnswersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $questions;
    public $answers;

    public function __construct($name, $email, $questions, $answers)
    {
        $this->name = $name;
        $this->email = $email;
        $this->questions = $questions;
        $this->answers = $answers;
    }

    public function build()
    {
        return $this->subject("Soumission d'un nouveau formulaire de questions")
                    ->view('emails.question-answers');
    }
}
