<?php


namespace abaranchik178\validation;


class ArrayValidator implements Validator
{
    private $rules;
    private $errorsCollection;

    public function __construct()
    {
        $this->errorsCollection = new ValidateErrorsCollection();
    }

    public function addRule(string $fieldName, ValidateRule $validateRule)
    {
        if ( ! isset($this->rules[$fieldName]) ) {
            $this->rules[$fieldName] = [];
        }
        $this->rules[$fieldName][] = $validateRule;
    }

    public function validate($data)
    {
        if ( empty($this->rules) ) {
            return true;
        }
        if ( empty($data) ) {
            return true;
        }
        foreach ($this->rules as $fieldName => $validateRules) {
            foreach ($validateRules as $rule) {
                //fixme??
                if ( ! isset($data[$fieldName]) ) {
                    throw new \LogicException(
                        "Your data don't have field $fieldName, but you try add validation rule for her"
                    );
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

    public function getErrors(string $fieldName = null)
    {
        if ( is_null($fieldName) ) {
            return $this->errorsCollection->getAll();
        }
        return $this->errorsCollection->getAllByFieldName($fieldName);
    }

    public function isHasErrors()
    {
        return ! $this->errorsCollection->isEmpty();
    }

    public function getErrorsMessages(string $fieldName)
    {
        $errors = $this->getErrors($fieldName);
        if ( empty($errors) ) {
            return [];
        }
        $errorsMessages = array_map(function($error) {
            return $error->getMessage();
        }, $errors);
        return $errorsMessages;
    }

    public function getErrorsMessagesAsString(string $fieldName)
    {
        $string = '';
        $errorsMessages = $this->getErrorsMessages($fieldName);
        if ( empty($errorsMessages) ) {
            return $string;
        }
        return implode(' and ', $errorsMessages);
    }
}