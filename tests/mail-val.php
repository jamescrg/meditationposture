<?php

require '../vendor/autoload.php';
require '../core/bootstrap.php';
require_once '../core/Message.php';
require_once '../core/Message_Validator.php';

$_POST['submitted']     = 1;
$_POST['name']          = '';
$_POST['email']         = '';
$_POST['subject']       = '';
$_POST['body']          = '';

$_POST['g-recaptcha-response'] = 1;

$message = new Message;

$validator = new Message_Validator($message);

$validator->checkName();
$validator->checkSubject();
$validator->checkBody();
$validator->checkRecaptcha();

var_dump($validator);
