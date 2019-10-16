<?php


namespace abaranchik178\validation\rules;

use abaranchik178\validation\ValidateRule;

class Email extends ValidateRule
{
    const PATTERN = '/^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';
    public function isValid($value): bool
    {
        if ( ! is_string($value) ) {
            return false;
        }
        if ( 1 !== preg_match(self::PATTERN, $value) ) {
            $this->defaultErrorMessage = "Please enter a valid email address";
            return false;
        }
        return true;
    }
}