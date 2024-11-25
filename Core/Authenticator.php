<?php

namespace Core;

use Core\App;
use Core\Database;
use Session\Session;


class Authenticator
{

    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();



        if ($user) {
            // we have a user, but we don´t know if the password provided matches what we have in the database.
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }

        return false;
    }



    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        // update the current session id with the newly generated one
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
