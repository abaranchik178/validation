<?php

namespace chungachanga\simpleform;


abstract class DataSource
{
    protected $data;

    public function getData(): array
    {
        return $this->data;
    }
}