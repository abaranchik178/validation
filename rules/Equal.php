<?php


namespace abaranchik178\validation\rules;


class Equal
{
    private $valueForCompare;
    
    public function __construct($valueForCompare)
    {
        $this->valueForCompare = $valueForCompare;
    }

    public function isValid($value): bool
    {
        if ( $value === $this->valueForCompare) {
            return true;
        }
        $this->defaultErrorMessage = "Values is not equal";
        return false;
    }
}