<?php
// Config data
$config = require('config.php');

// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'Notes';

$notes = [];

dd($db);

require "views/notes.view.php";
