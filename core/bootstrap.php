<?php


// add parent directory to include path so that core and view directories are available

$parentDir = '/var/www/mp';

set_include_path(get_include_path() . PATH_SEPARATOR . $parentDir);


// load helper functions

require 'helpers.php';


// load core application components

require 'App.php';

require 'Request.php';

require 'Router.php';


