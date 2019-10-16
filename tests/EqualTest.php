<?php


namespace abaranchik178\validation\tests;


use PHPUnit\Framework\TestCase;
use abaranchik178\validation\rules\Equal;

class EqualTest extends TestCase
{
    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($value1, $value2,  $isValid)
    {
        
        $rule = new Equal($value1);
        $result = $rule->isValid($value2);
        $this->assertSame($result, $isValid);
    }

    public function isValidProvider()
    {
        return [
            [
                'value',
                'value',
                true
            ],
            [
                'value',
                'anotherValue',
                false
            ]
        ];
    }
}