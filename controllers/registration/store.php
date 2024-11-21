<?php

/**
 * Controller: Stores Email and Password
 */


$email = $_POST['email'];
$password = $_POST['password'];

// validate form inputs


// check if the account already exists
    // If yes, redirect to a login page
    // If not, save to the database, and then log the user in, and redirect
