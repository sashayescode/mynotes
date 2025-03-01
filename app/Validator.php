<?php

class Validator
{
    public static $errors = [];
    
    public static function string($value)
    {
        $valueForCheck = trim($value);

        if (mb_strlen($valueForCheck) === 0) {
            self::$errors['text'] = 'Can not be empty';
        }

        if (mb_strlen($valueForCheck) > 100) {
            self::$errors['text'] = 'Can not be more than 100';
        }

        return self::$errors;
    }


    public static function email($value)
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL )){
            self::$errors['text'] = 'Not a valid email';
        }

        return self::$errors;
    }
}
