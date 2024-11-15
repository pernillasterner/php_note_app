<?php

require 'functions.php';
// require 'router.php';
require 'Database.php';


// Config data
$config = require('config.php');

// Initialize a new instance of a class
$db = new Database($config['database']);

// /?id=1
$id = $_GET['id'];
// Use placeholder to prevent intrusion. Bind the value later on to protect the db.
$query = "select * from posts where id = :id";

// Calling the query method
$posts = $db->query($query, [':id' => $id])->fetch();

dd($posts);
