<?php

// manages user input in association with the contact page
// -------------------------------------------------------

class ContactController
{

    // check for user-submitted input from the contact form
    // this uses a hidden input element on the form called "submitted"
    private function checkSubmit() {

        if (isset($_POST['submitted'])) return true;
        return false;
            
            //require 'core/email.php';

    }


    // selects which view to display on the user
    // defaults to the form
    // shows a success message if the user has sent a successful email
/*    private function selectView($submitted){*/

        //$view = 'form';
        //if ($submitted) $view = 'message';

        //return $view;

    /*}*/


    private function checkRecaptcha(){

        $response = $_POST["g-recaptcha-response"];

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
            return false;
        } else if ($captcha_success->success==true) {
            return true;
        }

    }


    // loads the contact page
    // checks for user submitted input
    // if the user has submitted input, evaluates that input
    // if the input was successful, loads the success view
    // if the input was not successful reloads the form
    // loads a blank form by default
    public function load() {

        $submitted = $this->checkSubmit(); 

            $view = 'form';


        if ($submitted) {

            $recaptcha = $this->checkRecaptcha();
            
            if ($recaptcha) {

                require '../core/Mailer.php';
                $mailer = new Mailer;
                $mailer->send();
                
                $view = 'success';

            } else {

                $view = 'failure';

            }


        }

        //$view = $this->selectView($submitted);

        $text = file_get_contents('../views/contact/'.$view.'.php');

        return $text;

    }

}
