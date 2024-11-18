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
$config = require base_path('config.php');

// Connects to the database
$db = new Database($config['database']);



// Retrievs notes for user_id = 1
$notes = $db->query('select * from notes where user_id = 1')->get();


// Passes data to the view for rendering
view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
