<?php

/**
 * Controller: View a Specific Note
 * 
 * This script retrieves a specific note from the database
 * based on the note ID provided in the URL.
 * 
 */

use Core\App;
use Core\Database;

// Loads configuration data and connects to the database
$db = App::resolve(Database::class);

$currentUserId = 1;

// Fetches the note using the provided ID with parameterized queries to prevent SQL injection.
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

// Ensures that the current user is authorized to view the note.
authorize($note['user_id'] === $currentUserId);

// Passes data to the view for rendering
view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
