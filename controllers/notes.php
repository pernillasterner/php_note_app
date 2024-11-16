<?php

/**
 * Controller: Display Notes
 * 
 * This script handles the retrieval of notes for a specific user
 * from the db and prepares the data for rendering in the
 * corresponding view file (`notes.view.php`)
 * 
 */

// Loads configuration data
$config = require('config.php');

// Connects to the database
$db = new Database($config['database']);

$heading = 'My Notes';

// Retrievs notes for user_id = 1
$notes = $db->query('select * from notes where user_id = 1')->get();


// Passes data to the view for rendering
require "views/notes.view.php";
