<?php

namespace abaranchik178\validation;


abstract class ValidateRule
{
    protected $defaultErrorMessage;
    protected $customErrorMessage;
    
    abstract public function isValid($value): bool;

    public function getErrorMessage()
    {
        return $this->customErrorMessage ?? $this->defaultErrorMessage ?? null;
    }
    
    public function setErrorMessage(string $errorMessage)
    {
        $this->customErrorMessage = $errorMessage;
    }
}