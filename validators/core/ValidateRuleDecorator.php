<?php


namespace simpleform\validators\core;


class ValidateRuleDecorator implements ValidateRule
{
    private $baseRule;
    private $errorMessage;

    public function __construct(ValidateRule $baseRule)
    {
        $this->baseRule = $baseRule;
    }

    public function check($value)
    {
        $this->baseRule->check($value);
        //...
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}