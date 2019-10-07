<?php

namespace simpleform\validation;


interface ValidateRule
{
    public function check($value);
    public function getErrorMessage(): string;
}