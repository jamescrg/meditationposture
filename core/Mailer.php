<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer 
{
    public function send() {

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

            $mail->setFrom($_POST['email'], $_POST['name']);
            $mail->addAddress('meditationposture@gmail.com', '');
            $mail->addAddress('jamespcraig@gmail.com', '');
            $mail->addReplyTo($_POST['email'], $_POST['name']);


            // Content
            
            $mail->isHTML(true);
            $mail->Subject = 'MP Site Message - ' . $_POST['subject'];
            $mail->Body    = $_POST['name'] .'<br>'.  $_POST['email'] .'<br><br>'. $_POST['body'];
            $mail->AltBody = $_POST['name'] .'<br>'.  $_POST['email'] .'<br><br>'. $_POST['body'];

            $mail->send();

        } catch (Exception $e) {

            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }

    }

}
