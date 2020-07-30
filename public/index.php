<?php


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


// Route the request to the selected page
// -------------------------------------------------------
// The Router class compares the list of pages to the current URI
// It then sets the current page to the one that matches the current request
// In other words, "directs" the request to the appropriate page

$router = new Frame\Router();

$page = $router->direct();

// Load the appropriate controller based on the page type
// -------------------------------------------------------
// the controller then loads the list of relevant templates and 
// provides them with the relevant data

if ($page == "contact") {

    $cc = new App\Contact\Controller();
    $cc->load();
    $tips = $cc->tips;
    $views = $cc->views;

} else {

    $ac = new App\Article\Controller;
    $text = $ac->load($page);
    $views[] = 'articles/article.php';

}


// load the requested page 
// -------------------------------------------------------

require 'views/layout.php';
