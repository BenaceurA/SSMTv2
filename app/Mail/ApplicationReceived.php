<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $Nom_Prenom;
    public $Subject;
    public $Sexe;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Subject, $Nom_Prenom, $Sexe)
    {
        $this->Nom_Prenom = $Nom_Prenom;
        $this->Subject = $Subject;
        $this->Sexe = $Sexe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email/applicationReceived')->subject($this->Subject);
    }
}
