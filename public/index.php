<?php


// require core application components

set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/mp');
require 'vendor/autoload.php';
require_once('../core/bootstrap.php');


// instantiate the App

$app = new App;


// obtain the user Request

$request = new Request;

$uri = $request->getUri();


// Route the request to the selected page

$router = new Router($uri, $app);

$page = $router->direct();


// Parse the Markdown for the page

$text = file_get_contents('../views/articles/' . $page . '.mkd'); 
$Parsedown = new Parsedown();
$text = $Parsedown->text($text); 


// load the Page 

require_once('views/layout.php');

