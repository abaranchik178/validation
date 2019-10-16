<?php

namespace abaranchik178\validation\tests;

use abaranchik178\validation\rules\Callback;
use PHPUnit\Framework\TestCase;

class CallbackTest extends TestCase
{
    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($arg1, $isValid)
    {
        $rule = new Callback(function($arg1) {
             return 2 ===  $arg1;
        });
        $result = $rule->isValid($arg1);
        $this->assertSame($result, $isValid);
    }
    
    public function isValidProvider()
    {
        return [
            [2, true],
            [3, false],
        ];
    }
}