<?php
namespace App\Contact;

// contains the user submitted message

class Message
{

    public $submitted;
    public $name;
    public $email;
    public $subject;
    public $body;
    public $recaptcha;

    function __construct()
    {

        if (isset($_POST['submitted'])) {

            $this->submitted = strip_tags($_POST['submitted']);
            $this->name = $_POST['name'];
            $this->email = $_POST['email'];
            $this->subject = $_POST['subject'];
            $this->body = $_POST['body'];
            $this->recatcpha = $_POST['g-recaptcha-response'];

        }

    }
}
