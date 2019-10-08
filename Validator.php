<?php


namespace abaranchik178\validation;


interface Validator
{
    public function addRule(string $fieldName, ValidateRule $validateRule);
    public function validate($data);
    public function getErrors(string $fieldName = null);
    public function isHasErrors();
    public function getErrorsMessages(string $fieldName);
    public function getErrorsMessagesAsString(string $fieldName);
}