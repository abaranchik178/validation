<?php


namespace simpleweb\validation\rules;

use simpleweb\validation\ValidateRule;

class Email extends ValidateRule
{
    const PATTERN = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';
    public function isValid($value)
    {
        if ( ! is_string($value) ) {
            return false;
        }
        if ( 1 !== preg_match(self::PATTERN, $value) ) {
            $this->errorMessage = "Please enter a valid email address";
            return false;
        }
        return true;
    }
}