<?php


namespace abaranchik178\validation\rules;


class Equal
{
    private $valueForCompare;
    
    public function __construct($valueForCompare)
    {
        $this->valueForCompare = $valueForCompare;
    }

    public function isValid($value)
    {
        if ( $value === $this->valueForCompare) {
            return true;
        }
        $this->errorMessage = "Values is not equal";
        return false;
    }
}