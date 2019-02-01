<?php

class App
{

    public $pages;

    function __construct()
    {
        $this->pages = $this->loadPages();
    }

    private function loadPages()
    {
        $pages = require('config/pages.php');
        return $pages;
    }

}
