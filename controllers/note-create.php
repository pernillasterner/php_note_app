<?php

// Config data
$config = require('config.php');
// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'Create a Note';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    // Check if POST contains string
    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'A body is required';
    }

    // Check that the number of characters in the string is not more then 1000. 
    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'The body can not be more than 1.000 characters.';
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


require 'views/note-create.view.php';
