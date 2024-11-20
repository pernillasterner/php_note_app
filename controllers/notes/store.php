<?php

/**
 * Controller: Store a Specific Note
 */

use Core\Validator;
use Core\Database;


// Config data
$config = require base_path('config.php');
// Initialize a new instance of a class
$db = new Database($config['database']);

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
    'user_id' => 1
]);

header('location: /notes');
die();
