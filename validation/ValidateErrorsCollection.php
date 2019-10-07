<?php


namespace simpleform\validation;


class ValidateErrorsCollection
{
    private $validateErrors = [];

    public function add($fieldName, ValidateError $error)
    {
        if ( !isset($this->validateErrors[$fieldName]) ) {
            $this->validateErrors[$fieldName] = [];
        }
        $this->validateErrors[$fieldName][] = $error;
    }

    public function getAllByFieldName(string $fieldName)
    {
        return $this->validateErrors[$fieldName] ?? [];
    }

    public function getAll()
    {
        return $this->validateErrors;
    }

    public function isEmpty(): bool
    {
        if ( count($this->validateErrors) > 0 ) {
            return false;
        }
        return true;
    }
}