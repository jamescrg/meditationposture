<?php

require '../vendor/autoload.php';
require '../core/bootstrap.php';
require_once '../core/Message.php';
require_once '../core/Message_Validator.php';

$_POST['submitted'] = 1;
$_POST['name'] = 'Bob Smith';
$_POST['email'] = 'bob@email.com';
$_POST['subject'] = 'Bob Smith Likey';
$_POST['body'] = 'I really like your really nice website.';
$_POST['g-recaptcha-response'] = 1;

$message = new Message;

$validator = new Message_Validator($message);

$validator->checkName();
$validator->checkSubject();
$validator->checkBody();

var_dump($validator);
