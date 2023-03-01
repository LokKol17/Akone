<?php

namespace User;

use App\Http\Controllers\UsersController\UserValidator;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    public function testIfUserCanStoreAccount()
    {
        $request = [
            'nick' => 'lok',
            'email' => 'loklok@loklok.com',
            'password' => 'password',
            'cpassword' => 'password',
        ];

        $controller = new UserValidator($request);
        $this->assertTrue($controller->validate());

    }
}
