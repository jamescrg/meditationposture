<?php

require '../vendor/autoload.php';
require '../core/bootstrap.php';
require_once '../core/Message.php';
require_once '../core/Message_Mailer.php';

$_POST['submitted'] = 1;
$_POST['name'] = 'Bob Smith';
$_POST['email'] = 'check@email.com';
$_POST['subject'] = 'Email Unit Test 2';
$_POST['body'] = 'I really like your really nice website.';
$_POST['g-recaptcha-response'] = 1;

$message = new Message;

var_dump($message);

$mailer = new Message_Mailer($message);

$mailer->send();
