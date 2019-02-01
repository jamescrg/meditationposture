<?php

class Router
{

    private $uri;

    private $pages = array('about', 'why', 'comfort', 'start', 'legs',
        'hands', 'back', 'chest', 'shoulders', 'head', 'conditioning', 'problems', 'faq',
        'sources');

    function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function direct()
    {
        $page = 'about';

        if ($this->uri) $page = $this->uri;

        if (!in_array($page, $this->pages)) $page  = 'about';

        return $page; 
    }

}
