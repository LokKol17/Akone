<?php /** @noinspection ALL */

namespace User;

use App\Http\Controllers\UsersController\UserValidator;
use App\Http\Controllers\UsersCotroller;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

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
