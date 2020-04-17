<?php
namespace Frame;

class Router
{

    private $uri;

    private $pages;

    function __construct()
    {
        // gets the current URI
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');

        // gets the list of available pages
        $this->pages = require('frame/pages.php');
    }

    // if the URI matches an available page, sets the current page to that value
    // otherwise, defaults to 'about'
    public function direct()
    {
        $page = 'about';

        if ($this->uri) $page = $this->uri;

        if (!in_array($page, $this->pages)) $page  = 'about';

        return $page; 
    }

}
