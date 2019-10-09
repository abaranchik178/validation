<?php

namespace abaranchik178\validation\tests;

use abaranchik178\validation\rules\NotEmpty;
use PHPUnit\Framework\TestCase;

class NotEmptyTest extends TestCase
{
    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($value, $isValid)
    {
        $rule = new NotEmpty();
        $result = $rule->isValid($value);
        $this->assertSame($result, $isValid);
    }
    
    public function isValidProvider()
    {
        return [
            ['sd', true],
            ['0', true],
            ['false', true],
            [ [], true],
            [false, true],

            ['', false],
            [null, false],
        ];
    }
}