<?php

/**
 * Controller: Log in user if credentials match
 */



use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

// create a form
$form = new LoginForm();

// validate email and password
if ($form->validate($email, $password)) {

    // create a authenticator and authenticate user based on email and password
    if ((new Authenticator)->attempt($email, $password)) {
        // sign in if success
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password.');
}


// if auth or validation fails, return to login form and display error message
Session::flash('errors', $form->errors());

Session::flash('old', [
    'email' => $_POST['email']
]);

return redirect('/login');
