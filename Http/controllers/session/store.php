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
    // if validation fails, return to login form and display the errors
    return view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
}

// create a authenticator
$auth = new Authenticator();


// authenticate user based on email and password
if ($auth->attempt($email, $password)) {
    // sign in if success
    redirect('/');
}

// if auth fails, return to login form and display the error message
return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);
