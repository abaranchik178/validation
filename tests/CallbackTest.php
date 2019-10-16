<?php

namespace abaranchik178\validation\tests;

use abaranchik178\validation\rules\Callback;
use PHPUnit\Framework\TestCase;

class CallbackTest extends TestCase
{
    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($arg1, $arg2, $sum, $isValid)
    {
        $rule = new Callback(function($arg1, $arg2, $sum) {
             return $arg1 + $arg2 === $sum;
        });
        $result = $rule->isValid([$arg1, $arg2, $sum]);
        $this->assertSame($result, $isValid);
    }
    
    public function isValidProvider()
    {
        return [
            [2, 9, 11, true],
            [2, 9, 13, false],
        ];
    }
}