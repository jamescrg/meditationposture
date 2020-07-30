<?php
namespace App\Contact;

// manages user input in association with the contact page
// -------------------------------------------------------

class Controller
{
    // tips for user to correct message
    public $tips = array();

    // views to display
    public $views = array();

    // message to pass through to contact form
    public $message;

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

        // instantiate a message object
        // this insures that an object is always declared, even if its empty
        // so that the message form does generate errors when loaded
        // the message object will autopopulate with the $_POST data
        $this->message = new Message;

        $submitted = $this->checkSubmit(); 

        if ($submitted) {

            // feed the message object to the validator
            // the validator will automatically run checks on the message
            // the results are stored in the validator's public properties
            $validator = new Validator($this->message);
            $validator->validate();

            if ($validator->grade == 'passed') {

                $mailer = new Mailer($this->message);
                $mailer->send();

                $views[] = 'views/contact/success.php';

            } else {

                $views[] = 'views/contact/failure.php';
                /* $views[] = 'views/contact/form.php'; */
                $this->tips = $validator->tips;

            }

        } else {

            $views[] = 'views/contact/invitation.php';
            /* $views[] = 'views/contact/form.php'; */

        }


        $this->views = $views;

    }

}
