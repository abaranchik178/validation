<?php


namespace simpleform\validation\rules;

use simpleform\validation\ValidateRule;

class NotEmpty implements ValidateRule
{
    private $errorMessage;

    public function check($value)
    {
        if ( empty($value) ) {
            $this->errorMessage = "this value cannot be empty";
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

}