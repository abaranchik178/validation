<?php


namespace simpleform\validation\rules;

use simpleform\validation\ValidateRule;

class StringLength implements ValidateRule
{
    private $minLength;
    private $maxLength;
    private $errorMessage;

    public function __construct(int $maxLength, int $minLength = 0)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }

    public function check($value)
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

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

}