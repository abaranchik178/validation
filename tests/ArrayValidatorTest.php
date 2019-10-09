<?php


namespace abaranchik178\validation\tests;

use abaranchik178\validation\validators\ArrayValidator;
use abaranchik178\validation\rules\Email;
use PHPUnit\Framework\TestCase;

class ArrayValidatorTest extends TestCase
{
    /**
     * @dataProvider validateEmailProvider
     */
    public function testValidateEmail($email, $isValid)
    {
        $validator = new ArrayValidator();
        $validator->addRule('some_email', new Email() );
        $result = $validator->validate([
            'some_email' => $email
        ]);
        $this->assertSame($result, $isValid);
    }
    /**
     * @dataProvider validateEmailProvider
     */
    public function testGetErrorsEmail($email, $isValid)
    {
        $validator = new ArrayValidator();
        $fieldName = 'some_email';
        
        $validator->addRule($fieldName, new Email() );
        $validator->validate([
            $fieldName => $email
        ]);
        
        if ($isValid) {
            $this->assertFalse( $validator->isHasErrors() );
        } else {
            foreach ( $validator->getErrors($fieldName) as $error) {
                $this->assertArrayHasKey('name', $error->getDescription() );
            }
        }
    }
    
    public function validateEmailProvider()
    {
        return [
            ['mail@dfg.ru', true],
            ['1mail@g.com', true],

            ['mail@@.com', false],
            ['345', false]
        ];
    }
}