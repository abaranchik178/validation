<?php


namespace simpleform\validation;


class ValidateError
{
    private $fieldName;
    private $fieldValue;
    private $message;

    public function __construct(string $fieldName, $fieldValue, string $message)
    {
        $this->fieldName = $fieldName;
        $this->fieldValue = $fieldValue;
        $this->message = $message;
    }

    public function getDescription(): array
    {
        return [
            'field name' => $this->fieldName,
            'field value' => $this->fieldValue,
            'message' => $this->message,
        ];
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}