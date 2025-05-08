<?php

namespace app\middleware;

class Guest
{
    public function handle()
    {
        if ($_SESSION['loggedIn'] ?? false) {
            header('location: /');
            exit();
        }
    }
}

