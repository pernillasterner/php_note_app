<?php
// Config data
$config = require('config.php');

// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'Notes';

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();

dd($notes);

require "views/notes.view.php";
