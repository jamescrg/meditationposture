<?php

class ArticleController
{

    public function load($page) {
        
        $text = file_get_contents('../views/articles/' . $page . '.mkd'); 
        $Parsedown = new Parsedown();
        $text = $Parsedown->text($text); 
        return $text;

    }

}
