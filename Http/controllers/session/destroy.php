<?php

use Core\Authenticator;

(new Authenticator)->logout();


// redirect to home page
header('location: /');
exit();
