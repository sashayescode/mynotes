<?php

namespace Http\Forms;

use app\Validator;

class LoginValidation
{

    protected $errors = [];

    public function validate($email, $password)
    {
        if (!empty(Validator::email($email))) {
            $this->errors['email'] = Validator::$errors['text'];
        }

        if (!empty(Validator::string($password, 1))) {
            $this->errors['password'] = Validator::$errors['text'];
        }

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
