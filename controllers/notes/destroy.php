<?php

/**
 * Controller: Delete a Specific Note
 * 
 */

use Core\App;

// Loads configuration data and connects to the database
$db = APP::container()->resolve(\Core\Database::class);

$currentUserId = 1;

// Fetches the note using the provided ID with parameterized queries to prevent SQL injection.
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Ensures that the current user is authorized to view the note.
authorize($note['user_id'] === $currentUserId);

// form was submitted. delete the current note.
$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

// Redirect user to notes page
header('location: /notes');
exit();
