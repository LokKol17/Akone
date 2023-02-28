<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerDestroy
{
    public function destroy(Request $request)
    {
        Auth::logout();
        FlashMessageHandler::putMessage($request, 'Deslogado com sucesso');
        return to_route('homepage');
    }
}
