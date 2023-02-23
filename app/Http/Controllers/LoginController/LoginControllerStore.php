<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\GeneralFunctions\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerStore
{
    const SIGNIN_PAGE = 'signin';
    use MessageTrait;
    public function store(Request $request)
    {
        $validator = new UserLoginValidator($request->all());
        if (!$validator->validate()) {
            $this->putMessage($request, $validator->errorMessage());
            return to_route(self::SIGNIN_PAGE);
        }

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            $this->putMessage($request, __('auth.failed'));
            return to_route(self::SIGNIN_PAGE);
        }

        return to_route('homepage');
    }
}
