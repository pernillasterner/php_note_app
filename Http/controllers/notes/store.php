<?php

/**
 * Controller: Store a Specific Note
 */

use Core\App;
use Core\Validator;
use Core\Database;

// Loads configuration data and connects to the database
$db = App::resolve(Database::class);

// Check if POST contains string. :: Calling a static method on a Class
if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

// If validation errors
if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}



// Insert the incoming response to the database. 
// Need to add the useID
$db->query('INSERT INTO notes (body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 8
]);

header('location: /notes');
die();
