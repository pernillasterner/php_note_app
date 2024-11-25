<?php

/**
 * Controller: Log in user if credentials match
 */



use Core\Authenticator;
use Http\Forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

// create a form
$form = new LoginForm();

// validate email and password
if (! $form->validate($email, $password)) {

    // create a authenticator and authenticate user based on email and password
    if ((new Authenticator)->attempt($email, $password)) {
        // sign in if success
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password.');
}


// if auth or validation fails, return to login form and display error message
return view('session/create.view.php', [
    'errors' => $form->errors()
]);
