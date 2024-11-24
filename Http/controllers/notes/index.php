<?php

/**
 * Controller: Display Notes
 * 
 * This script handles the retrieval of notes for a specific user
 * from the db and prepares the data for rendering in the
 * corresponding view file (`notes.view.php`)
 * 
 */

use Core\App;
use Core\Database;

// Loads configuration data and connects to the database
$db = App::resolve(Database::class);


// Retrievs notes for user_id = 1
$notes = $db->query('select * from notes where user_id = 1')->get();


// Passes data to the view for rendering
view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
