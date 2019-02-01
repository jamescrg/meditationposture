<?php

class Router
{

    private $uri;

    function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function direct()
    {
        $page = 'about';

        if ($this->uri) $page = $this->uri;

        return $page; 
    }

}
