<?php

use Core\App;
use Core\Database;
use Core\Container;

$container = new Container();

// Bind things into the container
// Binding the key 'Core\Database' to a function
$container->bind('Core\Database', function () {
    // Loads configuration data
    $config = require base_path('config.php');

    // Connects to the database
    return new Database($config['database']);
});


App::setContainer($container);
