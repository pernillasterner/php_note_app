<?php

/**
 * Controller that handles Notes from a specific user
 */


// Config data
$config = require('config.php');


// Initialize a new instance of a class
$db = new Database($config['database']);

$heading = 'Note';


// Get id from the url and use that id to get the corresponding data from the database. Use wildcard to prevent sql injections.
$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();

// Two reasons why we want to abort
// 1. If the note exists in the database but current user did not create is. Access problem
// 2. Note doesn't exist in the database.
// Status code 404 - Page Not Found
if (! $note) {
    abort();
}

$currentUserId = 1;

// Status code 403 - Forbidden
if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}


require "views/note.view.php";
