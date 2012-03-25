<?php

require 'SplClassLoader.php';

use FARpa\User;
use FARpa\Helper\View;

define('F_APP_ID','243031435766361');
define('F_SECRET','3d96f9817d39e31676395af8c34c8e76');
set_include_path(get_include_path().PATH_SEPARATOR.__DIR__.PATH_SEPARATOR.__DIR__.'/lib/');
$loader = new SplClassLoader();
$loader->register();

$foo = new User();
var_dump($foo->getAll());
echo View::index();






