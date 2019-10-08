<?php


namespace simpleweb\validation;


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

    public function getMessagesByFieldName(string $fieldName)
    {
        $messages = [];
        $errors = $this->getAllByFieldName($fieldName);
        if ( empty($errors) ) {
            return $messages;
        }
        $messages = array_map(function($fieldError) {
            return $fieldError->getMessage();
        }, $this->validateErrors[$fieldName]);
        return $messages;
    }
}