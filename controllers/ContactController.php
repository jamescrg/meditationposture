<?php

// manages user input in association with the contact page
// -------------------------------------------------------

class ContactController
{
    // tips for user to correct message
    public $tips = array();

    // views to display
    public $components = array();

    // check for user-submitted input from the contact form
    // this uses a hidden input element on the form called "submitted"
    private function checkSubmit() {

        if (isset($_POST['submitted'])) return true;
        return false;
            
    }

    // loads the contact page
    // checks for user submitted input
    // if the user has submitted input, evaluates that input
    // if the input was successful, loads the success view
    // if the input was not successful reloads the form
    // loads a blank form by default
    public function load() {

        $submitted = $this->checkSubmit(); 

        if ($submitted) {

            // instantiate a new message object
            $message = new Message;

            // feed the message object to the validator
            // the validator will automatically run checks on the message
            // the results are stored in the validator's public properties
            $validator = new Message_Validator($message);
            
            if ($validator->result == 'passed') {

                $mailer = new Message_Mailer($message);
                $mailer->send();
                
                $components[] = 'views/contact/success.php';

            } else {

                $components[] = 'views/contact/failure.php';
                $components[] = 'views/contact/form.php';
                $this->tips = $validator->details;

            }

        } else {

            $components[] = 'views/contact/invitation.php';
            $components[] = 'views/contact/form.php';

        }


        $this->components = $components;

    }

}
