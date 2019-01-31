<?php

$parentDir = '..';
set_include_path(get_include_path() . PATH_SEPARATOR . $parentDir);

require_once('core/functions.php');
require_once('core/router.php');

$chapter = Router::getChapter();
require_once('views/layout.php');
