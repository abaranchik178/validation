<?php


namespace abaranchik178\validation\validators;
use abaranchik178\validation\{
    Validator,
    ValidateError
};

class ArrayValidator extends Validator
{
    public function validate($data)
    {
        if ( empty($this->rules) ) {
            return true;
        }
        foreach ($this->rules as $fieldName => $validateRules) {
            foreach ($validateRules as $rule) {
                if ( ! isset($data[$fieldName]) ) {
                    $this->errorsCollection->add($fieldName, new ValidateError(
                        $fieldName,
                        null,
                        "Your data don't have field $fieldName"
                    ));
                }
                if ( ! $rule->isValid($data[$fieldName]) ) {
                    $this->errorsCollection->add($fieldName, new ValidateError(
                        $fieldName,
                        $data[$fieldName],
                        $rule->getErrorMessage()
                    ));
                }
            }
        }
        if ( $this->isHasErrors() ) {
            return false;
        }
        return true;
    }
}