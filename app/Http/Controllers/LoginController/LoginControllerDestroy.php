<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerDestroy extends Controller
{
    public function destroy(Request $request)
    {
        Auth::logout();
        $this->messageHandler::putMessage($request, 'Deslogado com sucesso');
        return to_route('homepage');
    }
}
