<?php

/**
 * Controller: Update a Specific Note
 */


use Core\App;
use Core\Database;
use Core\Validator;

// Loads configuration data and connects to the database
$db = App::resolve(Database::class);

$currentUserId = 1;

// Find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);


// validate the form
$errors = [];


// Check if POST contains string. :: Calling a static method on a Class
if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}


// if no validation errors, update the record in the notes database table
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}


// update the record
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /notes');
die();
