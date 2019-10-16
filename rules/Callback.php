<?php


namespace abaranchik178\validation\rules;

use abaranchik178\validation\ValidateRule;

class Callback extends ValidateRule
{
    protected $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function isValid($value): bool
    {
        return call_user_func($this->callback, $value);
    }
}