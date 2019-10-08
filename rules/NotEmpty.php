<?php


namespace simpleweb\validation\rules;

use simpleweb\validation\ValidateRule;

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