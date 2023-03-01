<?php

namespace Validantions;

use App\Http\Controllers\LoginController\UserLoginValidator;
use Tests\TestCase;

class ValidationDataTest extends TestCase
{
    public function testValidateThatUserDataShouldBeCorrect()
    {
        $validator = new UserLoginValidator([
            'email' => 'mail@example.com',
            'password' => 'passwordSample'
        ]);

        $result = $validator->validate();
        $this->assertTrue($result);
    }

    public function testValidateThatUserDataShouldBeInvalid()
    {
        $validator = new UserLoginValidator([
            'email' => 'invalidMail',
            'password' => ''
        ]);

        $result = $validator->validate();
        $this->assertFalse($result);
    }

    public function testErrorMessageIsWorking()
    {
        $validator = new UserLoginValidator([
            'email' => 'invalidMail',
            'password' => ''
        ]);

        $validator->validate();
        $this->assertEquals('Email inválido', $validator->errorMessage());
    }
}
