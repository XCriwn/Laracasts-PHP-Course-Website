<?php

use Core\Container;
use database\Database;
use Core\App;

$container = new Container();

$container->bind('database\Database', function(){
    $config = require base_path('database/config.php');
    return new Database($config['database']);
});

App::setContainer($container);