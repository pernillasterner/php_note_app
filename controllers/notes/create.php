<?php

/**
 * Controller: Creating Notes
 */

require 'Validator.php';

// Config data
$config = require 'config.php';
// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'Create a Note';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    // Check if POST contains string. :: Calling a static method on a Class
    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }


    // If no validation errors proceed
    if (empty($errors)) {
        // Insert the incoming response to the database. 
        // Need to add the useID
        $db->query('INSERT INTO notes (body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}


require 'views/create.view.php';
