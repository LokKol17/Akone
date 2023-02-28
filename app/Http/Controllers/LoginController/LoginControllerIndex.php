<?php

namespace App\Http\Controllers\LoginController;

use App\Http\Controllers\GeneralFunctions\FlashMessageHandler;
use Illuminate\Http\Request;

class LoginControllerIndex
{
    public function index(Request $request)
    {
        $mensagem = FlashMessageHandler::getMessage($request);
        return view('signin.index')->with('mensagem', $mensagem);
    }
}
