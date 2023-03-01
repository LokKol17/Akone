<?php

namespace Models;

use App\Models\User;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    public function testCanCreateAUserModel()
    {
        $user = new User();
        $user->nick = 'Teste';
        $user->email = 'mail@example.com';
        $user->password_hash = '123456';

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Teste', $user->nick);
        $this->assertEquals('mail@example.com', $user->email);
        $this->assertEquals('123456', $user->password_hash);
    }
}
