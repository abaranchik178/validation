<?php


namespace abaranchik178\validation\rules;

use abaranchik178\validation\ValidateRule;

class NotEmpty extends ValidateRule
{
    public function isValid($value)
    {
        if ( empty($value) ) {
            $this->errorMessage = "this value cannot be empty";
            return false;
        }
        return true;
    }
}