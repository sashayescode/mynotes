<?php

namespace app\middleware;

class Auth
{
    public function handle()
    {
        if (!isset($_SESSION['loggedIn']) ?? false) {
            header('location: /');
            exit();
        }
    }
}
