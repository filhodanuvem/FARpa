<?php


require_once __DIR__.'/vendor/autoload.php';
use FARpa\User;
use FARpa\Helper\View;

define('F_APP_ID','243031435766361');
define('F_SECRET','3d96f9817d39e31676395af8c34c8e76');

$foo = new User();
var_dump($foo->getAll());
echo View::index();






