<?php


namespace chungachanga\simpleform\validation\rules;

use chungachanga\simpleform\validation\ValidateRule;

class StringLength extends ValidateRule
{
    private $minLength;
    private $maxLength;

    public function __construct(int $maxLength, int $minLength = 0)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }

    public function isValid($value)
    {
        if ( !is_string($value) ) {
            throw new \InvalidArgumentException('...must be a string');
        }
        $strlen = strlen($value);
        if ( $this->minLength <= $strlen && $strlen <= $this->maxLength) {
            return true;
        }

        $this->errorMessage = "length must be between {$this->minLength} and {$this->maxLength}";
        return false;
    }
}