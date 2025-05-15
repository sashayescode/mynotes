<?php

namespace app;

use app\App;
use app\Database;


class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email,
        ])->find();

        if ($user) {
            if ($email === $user['email'] && password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        } else {
            return false;
        }
    }

    public function login($user)
    {
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['name'] = $user['name'];
        redirect('/');
    }

    public function logout()
    {
        $_SESSION = [];
        redirect('/login');
    }
}
