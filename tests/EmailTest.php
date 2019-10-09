<?php

namespace abaranchik178\validation\tests;

use abaranchik178\validation\rules\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($mail, $isValid)
    {
        $rule = new Email();
        $result = $rule->isValid($mail);
        $this->assertSame($result, $isValid);
    }
    
    public function isValidProvider()
    {
        return [
            ['mail@dfg.ru', true],
            ['1mail@g.com', true],
            ['1mail.mail@g.com', true],
            ['#mail@mail.com', true],
            
            ['mail@@.com', false],
            ['mailmail', false],
            ['345', false],
            ['@', false],
            ['@.com', false],
            ['@.com', false],
        ];
    }
}