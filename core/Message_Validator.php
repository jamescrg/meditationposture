<?php

// validates the data in the user submitted message

class Message_Validator
{

    private $message;
    public $result = 'passed';
    public $details = array();

    // Message validator needs a message to validate
    function __construct(Message $message) {

        $this->message = $message;
        $this->checkName();
        $this->checkSubject();
        $this->checkBody();
        $this->checkRecaptcha();
    } 


    public function checkName(){

        $len = strlen($this->message->name);
        if ($len > 50) {
            $this->result = 'failed';
            $this->details[] = 'Please enter fewer than 50 characters in the name field.';
        }

    }

    public function checkSubject(){

        $len = strlen($this->message->subject);
        if ($len > 50) {
            $this->result = 'failed';
            $this->details[] = 'Please enter fewer than 50 characters in the subject field.';
        }

    }

    public function checkBody(){

        $len = strlen($this->message->name);
        if ($len > 50) {
            $this->result = 'failed';
            $this->details[] = 'Please write a short  message.';
        }

    }

    public function checkRecaptcha(){

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
        $captcha_success=json_decode($verify);

        if ($captcha_success->success==false) {

            $this->result = 'failed';
            $this->details[] = 'Recaptcha attempt failed. Please try again.';

        } else if ($captcha_success->success==true) {

            return true;

        }

    }


}
