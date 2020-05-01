<?php
namespace App\Contact;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer 
{
    public $message;

    function __construct($message)
    {

        $this->message = $message;

    }

    public function send()
    {

        $mail = new PHPMailer(true);

        try {

            //Server settings

            $mail->isSMTP();  
            $mail->Mailer = "smtp";
            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = 'meditationposture@gmail.com';
            $mail->Password   = 't0rmmail';

            //Recipients

            $mail->setFrom($this->message->email, $this->message->name);
            $mail->addAddress('meditationposture@gmail.com', '');
            $mail->addAddress('jamespcraig@gmail.com', '');
            $mail->addReplyTo($this->message->email, $this->message->name);


            // Content
            
            $mail->isHTML(true);
            $mail->Subject = 'MP Site Message - ' . $this->message->subject;
            $mail->Body    =    $this->message->name .'<br>'
                                .  $this->message->email .'<br><br>'
                                . $this->message->body;
            $mail->AltBody = $mail->Body;
            $mail->send();

        } catch (Exception $e) {

            return false;

            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }

    }

}
