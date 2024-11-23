<?php

/**
 * Controller: Stores Email and Password
 */

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate form inputs
$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator::string($password, 2, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


// connect to database
$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();



if ($user) {
    // then someone with that email already exists and has an account
    // If yes, redirect to a login page.
    header('location: /');
    exit();
} else {
    // If not, save one to the database, and then log the user in, and redirect.

    // save to database
    $db->query(
        'INSERT INTO users(email, password) VALUES(:email, :password)',
        [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]
    );

    // log in user
    login([
        'email' => $email
    ]);


    // redirect
    header('location: /');
    exit();
}
