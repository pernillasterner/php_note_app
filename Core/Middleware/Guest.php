<?php

namespace Core\Middleware;


class Guest
{

    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
            // redirect users that are not signed in
            header('location: /');
            exit();
        }
    }
}
