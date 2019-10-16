<?php


namespace abaranchik178\validation\rules;

use abaranchik178\validation\ValidateRule;

class NotEmpty extends ValidateRule
{
    public function isValid($value): bool
    {
        if ( is_null($value) || (is_string($value) && 0 === strlen($value)) ) {
            $this->defaultErrorMessage = "this value cannot be empty";
            return false;
        }
        return true;
    }
}