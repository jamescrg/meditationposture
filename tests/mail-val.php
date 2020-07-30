<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// set include path
set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/mp');
set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/mp/src');

// include autoloader for classes
// -------------------------------------------------------
// class include paths are based on PSR-4 and the composer autoloader
// see compers.json for specific paths
require 'vendor/autoload.php';

// load helper functions
require 'frame/helpers.php';

// load router
require 'frame/Router.php';


$_POST['submitted']     = 1;
$_POST['name']          = '';
$_POST['email']         = '';
$_POST['subject']       = '';
$_POST['body']          = '';

$_POST['g-recaptcha-response'] = 1;

$message = new Contact\Message;

$validator = new Validator($message);

$validator->checkName();
$validator->checkSubject();
$validator->checkBody();
$validator->checkRecaptcha();

var_dump($validator);
