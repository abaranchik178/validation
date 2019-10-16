<?php


namespace abaranchik178\validation\rules;

use abaranchik178\validation\ValidateRule;

class StringLength extends ValidateRule
{
    private $minLength;
    private $maxLength;

    public function __construct(int $maxLength, int $minLength = 0)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }

    public function isValid($value): bool
    {
        if ( !is_string($value) ) {
            throw new \InvalidArgumentException('...must be a string');
        }
        $strlen = strlen($value);
        if ( $this->minLength <= $strlen && $strlen <= $this->maxLength) {
            return true;
        }

        $this->defaultErrorMessage = "length must be between {$this->minLength} and {$this->maxLength}";
        return false;
    }

    /**
     * @return int
     */
    public function getMinLength(): int
    {
        return $this->minLength;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }
    
}