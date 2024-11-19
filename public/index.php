<?php
//  __DIR__ = Current directory
// BASE_PATH = Root of the project
const BASE_PATH = __DIR__ . '/../';

// ...php_note_app/public/../
// var_dump(BASE_PATH);

// Loading functions
require BASE_PATH . 'functions.php';


// Automatically loads class files by converting the class name into a file path and requiring it.
spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});

require base_path('router.php');
