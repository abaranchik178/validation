<?php

namespace abaranchik178\validation\tests;

use abaranchik178\validation\rules\StringLength;
use PHPUnit\Framework\TestCase;

class StringLengthTest extends TestCase
{
    /**
     * @dataProvider isValidProvider_between3and7
     */
    public function testIsValid_between3and7($string, $isValid)
    {
        $rule = new StringLength(7, 3);
        $result = $rule->isValid($string);
        $this->assertSame($result, $isValid);
    }

    /**
     * @dataProvider isValidProvider_between0and9
     */
    public function testIsValid_between0and9($string, $isValid)
    {
        $rule = new StringLength(9);
        $result = $rule->isValid($string);
        $this->assertSame($result, $isValid);
    }
    
    public function isValidProvider_between0and9()
    {
        return [
            ['', true],
            ['true!!', true],
            ['123456789', true],
            ['1234567890', false],
            ['falsefalse false ', false],
        ];
    }

    public function isValidProvider_between3and7()
    {
        return [
            ['fgt', true],
            ['qwerty1', true],
            
            ['', false],
            ['as', false],
            ['qwerty123', false],
            ['falsefalse false ', false],
        ];
    }
}