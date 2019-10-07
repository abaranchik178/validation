<?php

namespace simpleform\validation;


abstract class ValidateRule
{
    protected $errorMessage;

    abstract public function isValid($value);

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}