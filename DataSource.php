<?php

namespace simpleform;

use simpleform\validators\core\{
    ValidateRule,
    ValidateError
};

abstract class DataSource
{
    protected $data;
    private $rules;
    private $validateErrors = [];

    public function addRule(string $fieldName, ValidateRule $validateRule)
    {
        if ( ! isset($this->rules[$fieldName]) ) {
            $this->rules[$fieldName] = [];
        }
        $this->rules[$fieldName][] = $validateRule;
    }

    public function validate()
    {
        if ( empty($this->rules) ) {
            return true;
        }
        foreach ($this->rules as $fieldName => $validateRules) {
            foreach ($validateRules as $rule) {
                //fixme??
                if ( ! isset($this->data[$fieldName]) ) {
                    throw new \LogicException(
                        "Your data don't have field $fieldName, but you try add validate rule for her"
                    );
                }
                if ( ! $rule->check($this->data[$fieldName]) ) {
                    $this->addError( new ValidateError(
                        $fieldName,
                        $this->data[$fieldName],
                        $rule->getErrorMessage()
                    ));
                }
            }
        }
        if ( 0 === count($this->getErrors()) ) {
            return true;
        }
        return false;
    }

    private function addError(ValidateError $error)
    {
        $this->validateErrors[] = $error;
    }

    public function getErrors()
    {
        return $this->validateErrors;
    }

    public function loadData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}