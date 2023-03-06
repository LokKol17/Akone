<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerStore extends Controller
{
    const SIGNIN_PAGE = 'signin';
    public function store(Request $request)
    {
        $validator = new UserLoginValidator($request->all());
        if (!$validator->validate()) {
            $this->messageHandler::putMessage($request, $validator->errorMessage());
            return to_route(self::SIGNIN_PAGE);
        }

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            $this->messageHandler::putMessage($request, __('auth.failed'));
            return to_route(self::SIGNIN_PAGE);
        }

        return to_route('homepage');
    }
}
