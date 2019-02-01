<?php


// require core application components

require_once('../core/bootstrap.php');


// instantiate the App

$app = new App;


// obtain the user Request

$request = new Request;

$uri = $request->getUri();


// Route the request to the selected page

$router = new Router($uri, $app);

$page = $router->direct();


// load the Page 

require_once('views/layout.php');

