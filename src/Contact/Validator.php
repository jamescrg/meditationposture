<?php
namespace App\Contact;

// validates the data in the user submitted message

class Validator
{

    private $message;
    public $grade = 'passed';
    public $tips = array();

    // Message validator needs a message to validate
    function __construct(Message $message)
    {

        $this->message = $message;
    } 

    public function validate()
    {

        $this->checkName();
        $this->checkEmail();
        $this->checkSubject();
        $this->checkBody();
        $this->checkRecaptcha();

    }


    public function checkName()
    {

        $len = strlen($this->message->name);

        if ($len < 2) {
            $this->grade = 'failed';
            $this->tips[] = 'Please enter your name.';
        }

        if ($len > 50) {
            $this->grade = 'failed';
            $this->tips[] = 'Please enter fewer than 50 characters in the name field.';
        }
    }

    public function checkEmail()
    {

        $len = strlen($this->message->email);

        if ($len < 2) {
            $this->grade = 'failed';
            $this->tips[] = 'Please enter your email address.';
        }

        if (!filter_var($this->message->email, FILTER_VALIDATE_EMAIL)) {
            $this->grade = 'failed';
            $this->tips[] = 'Your email address appears to have an invalid format.';
        }
    }

    public function checkSubject()
    {

        $len = strlen($this->message->subject);

        if ($len < 2) {
            $this->grade = 'failed';
            $this->tips[] = 'Please enter a subject.';
        }

        if ($len > 50) {
            $this->grade = 'failed';
            $this->tips[] = 'Please enter fewer than 50 characters in the subject field.';
        }
    }

    public function checkBody()
    {

        $len = strlen($this->message->body);

        if ($len < 2) {
            $this->grade = 'failed';
            $this->tips[] = 'Please include a message.';
        }

        $wc = str_word_count($this->message->body);

        if ($wc > 300) {
            $this->grade = 'failed';
            $this->tips[] = 'Your messsage has approximately ' . $wc . ' words. The limit is 300.';
        }
    }

    public function checkRecaptcha()
    {

        $response = $this->message->recaptcha;

        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $data = array(
            'secret' => '6LeKgegUAAAAAIjhowA5vnlBkATmStkfVnPtAoKG',
            'response' => $_POST["g-recaptcha-response"]
        );

        $options = array(
            'http' => array (
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if ($captcha_success->success == false) {

            $this->grade = 'failed';
            $this->tips[] = 'Captcha attempt failed. Please try the captcha challenge again.';

        } elseif ($captcha_success->success == true) {

            return true;

        }

    }


}
