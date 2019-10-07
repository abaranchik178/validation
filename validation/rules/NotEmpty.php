<?php


namespace simpleform\validation\rules;

use simpleform\validation\ValidateRule;

class NotEmpty implements ValidateRule
{
    private $errorMessage;

    public function check($value)
    {
        if ( ! empty($value) ) {
            return true;
        }
        $this->errorMessage = "this value cannot be empty";
        return false;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

}