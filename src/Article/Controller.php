<?php
namespace App\Article;

class Controller
{

    public function load($page) {
        
        $text = file_get_contents('../views/articles/' . $page . '.mkd'); 
        $parser = new \Parsedown();
        $text = $parser->text($text); 
        return $text;

    }

}
