<?php
// Config data
$config = require('config.php');

// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'Note';


// Get id from the url and use that id to get the corresponding data from the database. Use wildcard to prevent sql injections.
$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();


require "views/note.view.php";
