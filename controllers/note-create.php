<?php

// Config data
$config = require('config.php');
// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'Create a Note';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insert the incoming respons to the database. 
    // Need to add the useID

    $db->query('INSERT INTO notes (body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}


require 'views/note-create.view.php';
