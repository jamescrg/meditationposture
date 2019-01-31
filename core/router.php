<?php
class Router
{

    public static function getChapter()
    {
        $chapter = 'about';
        if ( isset($_GET['chapter']) ) $chapter = $_GET['chapter'];
        return $chapter;
    }

}
