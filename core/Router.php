<?php

class Router
{

    private $uri;

    private $pages;

    function __construct($uri, $app)
    {
        $this->uri = $uri;
        $this->pages = $app->pages;
    }

    public function direct()
    {
        $page = 'about';

        if ($this->uri) $page = $this->uri;

        if (!in_array($page, $this->pages)) $page  = 'about';

        return $page; 
    }

}
