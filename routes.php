<?php

// Declaration of routes. Route listener our endpoint
// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/note' => 'controllers/notes/show.php',
//     '/notes/create' => 'controllers/notes/create.php',
//     '/contact' => 'controllers/contact.php',
// ];



$router->get('/', 'controllers/index.php');
$router->delete('note', 'controllers/notes/destroy.php');
