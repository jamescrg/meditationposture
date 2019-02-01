<?php


// require core application components

require_once('../core/bootstrap.php');


// obtain the user request

$request = new Request;

$uri = $request->getUri();


// route the request to the selected page

$router = new Router($uri);

$page = $router->direct();


// load the views

require_once('views/layout.php');

