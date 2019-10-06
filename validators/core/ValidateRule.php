<?php

namespace simpleform\validators\core;


interface ValidateRule
{
    public function check($value);
    public function getErrorMessage(): string;
}