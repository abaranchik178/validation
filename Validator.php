<?php


namespace abaranchik178\validation;


abstract class Validator
{
    protected $rules;
    protected $errorsCollection;

    abstract public function validate($data);
    
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