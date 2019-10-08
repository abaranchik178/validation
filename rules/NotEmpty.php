<?php


namespace chungachanga\simpleform\validation\rules;

use chungachanga\simpleform\validation\ValidateRule;
use chungachanga\i18n\I18N;

class NotEmpty extends ValidateRule
{
    public function isValid($value)
    {
        if ( empty($value) ) {
            $this->errorMessage = "this value cannot be empty";
            return false;
        }
        return true;
    }
}