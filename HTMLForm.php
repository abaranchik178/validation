<?php

namespace chungachanga\simpleform;


class HTMLForm extends DataSource
{

    public function __construct($data)
    {
        if ( empty($data) ) {
            throw new \LogicException("form data is empty");
        }
        $this->data = $data;
    }
}