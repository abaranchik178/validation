<?php

namespace abaranchik178\validation;


abstract class ValidateRule
{
    protected $errorMessage;

    abstract public function isValid($value);

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}