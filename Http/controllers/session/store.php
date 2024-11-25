<?php

/**
 * Controller: Log in user if credentials match
 */



use Core\Authenticator;
use Http\Forms\LoginForm;



// create a form validate email and password
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);



// create a authenticator and authenticate user based on email and password
if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
    // sign in if success
    redirect('/');
}


$form->error('email', 'No matching account found for that email address and password.');
