<?php

/**
 * Controller: Log in user if credentials match
 */


use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

// connect to database
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// validate form inputs
$form = new LoginForm();

if (! $form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
}


// match the credentials
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($user) {
    // we have a user, but we don´t know if the password provided matches what we have in the database.
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        exit();
    }
}



return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);
