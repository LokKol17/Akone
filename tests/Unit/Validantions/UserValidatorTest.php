<?php

namespace Validantions;

use App\Http\Controllers\UsersController\UserValidator;
use Tests\TestCase;

class UserValidatorTest extends TestCase
{
    public function testUserCanBeValidatedSuccefully()
    {
        $user = [
            'nick' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => '12345678',
            'cpassword' => '12345678'
        ];

        $validator = new UserValidator($user);
        $this->assertTrue($validator->validate());
    }

    public function testFailPasswordAndPasswordConfirm()
    {
        $user = [
            'nick' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => '12345678',
            'cpassword' => '12345679'
        ];

        $validator = new UserValidator($user);
        $this->assertFalse($validator->validate());
        $this->assertEquals('As senhas não coincidem', $validator->errorMessage());
    }

    public function testFailPasswordLowerThan8Characters()
    {
        $user = [
            'nick' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => '1234567',
            'cpassword' => '1234567'
        ];

        $validator = new UserValidator($user);
        $this->assertFalse($validator->validate());
        $this->assertEquals('A senha deve ter no mínimo 8 caracteres', $validator->errorMessage());
    }

    public function testFailNickLowerThan3Characters()
    {
        $user = [
            'nick' => 'Jo',
            'email' => 'john@doe.com',
            'password' => '12345678',
            'cpassword' => '12345678'
        ];

        $validator = new UserValidator($user);
        $this->assertFalse($validator->validate());
        $this->assertEquals('O nickname deve ter no mínimo 3 caracteres', $validator->errorMessage());
    }

    public function testFailEmailIsInvalid()
    {
        $user = [
            'nick' => 'John Doe',
            'email' => 'johndoe',
            'password' => '12345678',
            'cpassword' => '12345678'
        ];

        $validator = new UserValidator($user);
        $this->assertFalse($validator->validate());
        $this->assertEquals('O email informado não é válido', $validator->errorMessage());
    }

    public function testPasswordHash()
    {
        $user = [
            'nick' => 'John Doe',
            'email' => 'johndoe',
            'password' => '12345678',
            'cpassword' => '12345678'
        ];

        $validator = new UserValidator($user);
        $hash = $validator->hash();

        $result = \Hash::check($user['password'], $hash);

        $this->assertIsString($hash);
        $this->assertNotEquals($user['password'], $hash);
        $this->assertTrue($result);
    }
}
