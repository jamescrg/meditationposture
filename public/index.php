<?php

// require core application components

set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/mp');
require 'vendor/autoload.php';
require 'core/bootstrap.php';


// instantiate the app
// -------------------------------------------------------
// the App object loads an array of pages
// about, back, start . . . etc.
// this array is loaded into $app

$app = new App;


// obtain the user Request
// -------------------------------------------------------
// the Request class obtains the current URI from
// the $_SERVER['REQUEST_URI'] superglobal variable

$request = new Request;

$uri = $request->getUri();


// Route the request to the selected page
// -------------------------------------------------------
// The Router class compares the list of pages to the current URI
// It then sets the current page to the one that matches the current request
// In other words "directs" the request to the appropriate page

$router = new Router($uri, $app);

$page = $router->direct();


// Load the appropriate controller based on the page type
// -------------------------------------------------------
// the contact page needs to load a form or a results message
// everything else just loads a static "article" (e.g. one of the pages with content)

if ($page == "contact") {

    require 'controllers/ContactController.php';
    $cc = new ContactController;
    $text = $cc->load();

} else {

    require 'controllers/ArticleController.php';
    $art = new ArticleController;
    $text = $art->load($page);

}


// load the requested page 
// -------------------------------------------------------

require 'views/layout.php';
