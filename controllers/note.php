<?php
// Config data
$config = require('config.php');

// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'My Note';


// 1. Get the id from the url
$id = $_GET['id'];
// 2. Use that id to get the corresponding data from the database
$note = $db->query("select * from notes where user_id = $id")->fetch();


require "views/note.view.php";
