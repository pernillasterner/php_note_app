<?php
//  __DIR__ = Current directory
// BASE_PATH = Root of the project
const BASE_PATH = __DIR__ . '/../';

// ...php_note_app/public/../
// var_dump(BASE_PATH);

require BASE_PATH . 'functions.php';

require base_path('Database.php');
require base_path('Response.php');
require base_path('router.php');
