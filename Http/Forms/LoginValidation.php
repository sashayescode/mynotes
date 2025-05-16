<?php

namespace Http\Forms;

use app\Validator;
use app\ValidationExpection;

class LoginValidation
{

    protected $errors = [];

    public function __construct($attributes)
    {        
        if (!empty(Validator::email($attributes['email']))) {
            $this->errors['email'] = Validator::$errors['text'];
        }

        if (!empty(Validator::string($attributes['password'], 1))) {
            $this->errors['password'] = Validator::$errors['text'];
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        if($instance->hasErrors()){
            throw new ValidationExpection();
        }

        return $instance;
    }

    public function hasErrors()
    {
        return count($this->errors);
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
