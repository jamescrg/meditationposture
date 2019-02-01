<?php

class Request
{

    public function getUri()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        return $uri;
    }

}
