<?php 

function dd($data) {

    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';

}

function highlight($page, $navItem) {
    if ($page == $navItem) echo 'style="font-weight: bold"';
}
