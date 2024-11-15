<?php
// Config data
$config = require('config.php');

// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'My Note';


// 1. Get the id from the url
// $id = $_GET['id']; !!.....If the variable is only used once, inline it....!!!
// 2. Use that id to get the corresponding data from the database. Use wildcard to prevent sql injections
$notes = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetchAll();


require "views/notes.view.php";
